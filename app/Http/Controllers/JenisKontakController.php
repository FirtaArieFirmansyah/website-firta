<?php

namespace App\Http\Controllers;

use App\Models\JenisKontak;
use Illuminate\Http\Request;

class JenisKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_kontak = JenisKontak::all();
        return view('tambah_jeniskontak', compact('jenis_kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_kontak' => 'required'
        ],[
            'jenis_kontak.required' => 'Jenis Kontak Wajib diisi'
        ]);

        JenisKontak::create($validatedData);
        return redirect('/admin/jeniskontak')->with('success', 'Berhasil Menambah Jenis Kontak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisKontak::find($id)->delete();
        
        return redirect('/admin/jeniskontak')->with('success', 'Berhasil Menghapus Jenis Kontak');
    }
}
