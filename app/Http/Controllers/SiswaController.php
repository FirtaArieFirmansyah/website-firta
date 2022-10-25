<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        // dd($siswas);
        return view('mastersiswa', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahsiswa');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
        'required' => ':attribute harus diisi yaa..',
        'min' => ':attribute minimal :min yaa..',
        'max' => ':attribute maksimal :max yaa..',
        'numeric' => ':attribute harus diisi angka yaa..',
        'mimes' => ':attribute harus bertipe jpg, jpeg, png yaa..',
        'size' => ':file yang diupload harus maksimal size yaa..',
        ];
        $validatedData = $request->validate([
            'nisn' => 'required|numeric',
            'nama' => 'required|min:5',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'foto' => 'image|file',
            'about' => 'required',
        ], $message );

        if ($request->file('foto') == null){
            $file = "";
        }else{
            $validatedData['foto'] = $request->file('foto')->store('siswa-images');
        }
        
        Siswa::create($validatedData);
        return redirect('/admin/mastersiswa');
        //return redirect()->back()->with('success', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        $projek = $siswa->project;
        return view('showsiswa', ['siswa'=>$siswa,'projek' => $projek]);
        // $siswa=Siswa::where('id', $id)->with('project')->firstorfail();
        // return view('showsiswa', ['siswa'=>$siswa]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('editsiswa', ['siswa'=>$siswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // $siswas = Siswa::findOrFail($id);
        // $siswas->nisn = $request->nisn;
        // $siswas->nama = $request->nama;
        // $siswas->alamat = $request->alamat;
        // $siswas->email = $request->email;
        // $siswas->jk = $request->jk;
        // $siswas->foto = "wkwkwk";
        // $siswas->about = $request->about;
        // $siswas->save();

        $validatedData = $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'foto' => 'image|file',
            'about' => 'required'
        ]);

        if($request->file('foto')){
            if($request->oldFoto){
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('siswa-images'); 
        }

        $siswas=Siswa::where('id', $id)
            ->update($validatedData);

        return redirect()->route('mastersiswa.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::destroy($id);
        return redirect('admin/mastersiswa');

     //return redirect()->route('categories.index')->with('success', 'Data Deleted Successfully');
    }
}
