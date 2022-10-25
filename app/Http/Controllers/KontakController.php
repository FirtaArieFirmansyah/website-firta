<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('masterkontak');
        //$kontaks = Kontak::all();
        //return view('masterkontak', compact('kontaks'));
        $siswas = Siswa::all();
        return view('masterkontak', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('tambahkontak');
        //$kontaks = Kontak::all();
        //return view('tambahkontak', compact('kontaks'));
        $simin_id = request()->query('siswa');
        $siswa = Siswa::find($simin_id);
        return view('tambahkontak', compact('siswa', 'simin_id'));
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
                'id_siswa' => 'required',
                'nama_project' => 'required',
                'deskripsi' => 'required',
                'foto' => 'image|file',
                'tanggal' => 'required',
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
    public function show($id)
    {
        //return view('showkontak');
        $siswas=Siswa::find($id)->kontak()->get();
        return view('showkontak', compact('siswas'));
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
        $siswas = Siswa::all();
        $kontaks = Kontak::where('id', $id)->firstorfail();
        return view('editkontak', compact('kontaks'), compact('siswas'));
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
                'id_siswa' => 'required',
                'nama_project' => 'required',
                'deskripsi' => 'required',
                'foto' => 'image|file',
                'tanggal' => 'required',
            ], $message );

            $kontaks = Kontak::where('id', $id)
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
        $kontaks = Kontak::find($id)
                ->delete();
        return redirect('admin/masterkontak');
    }
}
