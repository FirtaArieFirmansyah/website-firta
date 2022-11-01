<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\JenisKontak;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        $kontaks = Kontak::with('siswa')->get();
        return view('masterkontak', compact('siswas', 'kontaks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $simin_id = request()->query('siswa');
        $siswas = Siswa::find($simin_id);
        $kontaks = JenisKontak::all();
        return view('tambahkontak', compact('siswas', 'kontaks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $message = [
            'required' => ':attribute harus diisi yaa..',
            'min' => ':attribute minimal :min yaa..',
            'max' => ':attribute maksimal :max yaa..',
            'numeric' => ':attribute harus diisi angka yaa..',
            'mimes' => ':attribute harus bertipe jpg, jpeg, png yaa..',
            'size' => ':file yang diupload harus maksimal size yaa..',
            ];
            $validatedData = $request->validate([
                'siswa_id' => 'required',
                'jenis_kontak_id' =>'required',
                'deskripsi' => 'required',
            ], $message );
            
            Kontak::create($validatedData);
            return redirect('/admin/masterkontak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $masterkontak)
    {
        $kontaks = $masterkontak->kontaks;
       
        return view('showkontak', compact('kontaks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('editkontak');
        Kontak::find('id');
        $kontaks = Kontak::where('id', $id)->firstorfail();
        return view('editkontak', compact('kontaks'));
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
        //
        $message = [
            'required' => ':attribute harus diisi yaa..',
            'min' => ':attribute minimal :min yaa..',
            'max' => ':attribute maksimal :max yaa..',
            'numeric' => ':attribute harus diisi angka yaa..',
            'mimes' => ':attribute harus bertipe jpg, jpeg, png yaa..',
            'size' => ':file yang diupload harus maksimal size yaa..',
            ];
            $validatedData = $request->validate([
                
                'deskripsi' => 'required',

            ], $message );

            Kontak::where('id', $id)
                ->update($validatedData);
    
            return redirect()->route('masterkontak.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Kontak::find($id)
                ->delete();
        return redirect('admin/masterkontak');
    }
}
