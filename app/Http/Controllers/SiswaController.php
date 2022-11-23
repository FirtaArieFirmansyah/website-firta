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
    public function store(Request $request, Siswa $mastersiswa)
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

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . "_" . $file->getClientOriginalName();
            $save_db_foto = 'mastersiswa/' . $foto;

            $dir = public_path('img/admin/mastersiswa');
            if (!file_exists($dir)) mkdir($dir);

            $file->move($dir, $foto);
        }else{
            $save_db_foto = 'default.jpg';
        }

        $validatedData['foto'] = $save_db_foto;

        Siswa::create($validatedData);
        return redirect('/admin/mastersiswa');
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
        $kontak = $siswa->kontaks;
        return view('showsiswa', ['siswa'=>$siswa,'projek' => $projek, 'kontak'=>$kontak]);
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
    public function update(Request $request, Siswa $mastersiswa)
    {
        $messages=[
            'required' => ':attribute harus diisi gess',
            'min' => ':attribute minimal :min karakter ya gess',
            'max' => ':attribute maksimal :max karakter ya gess',
            'mimes' => 'file: attribute harus bertipe png,jpeg,svg,gif',
            'numeric' => ':attribute harus diisi angka gess',
            ];
           $validatedData = $request->validate([
            'nisn'=> 'required|numeric|',
            'nama' => 'required',
            'alamat' => 'required|min:5',
            'jk' => 'required',
            'email' => 'required',
            'foto' => 'image|file|mimes:jpg,jpeg,gif,svg',
            'about' => 'required'
           ], $messages); 

           if ($request->hasFile('foto')) {
                if ($mastersiswa->foto != 'default.jpg') {
                    $old_foto = public_path('img/admin/' . $mastersiswa->foto);
                    if (file_exists($old_foto)) unlink($old_foto);
                }

            $file = $request->file('foto');
            $foto = time() . "_" . $file->getClientOriginalName();
            $save_db_foto = 'mastersiswa/' . $foto;

            $dir = public_path('img/admin/mastersiswa');
            $file->move($dir, $foto);
            $validatedData['foto'] = $save_db_foto;
        }

        $mastersiswa->update($validatedData);

        return redirect()->route('mastersiswa.index');
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
