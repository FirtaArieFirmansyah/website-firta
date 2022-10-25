<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('masterproject');
        //$projects = Project::all();
        // dd($projects);
        //return view('masterproject', compact('projects'));
        $siswas = Siswa::all();
        return view('masterproject', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $mimin_id = request()->query('siswa');
        $siswa = Siswa::find($mimin_id);
        return view('tambahproject', compact('siswa', 'mimin_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request = $request->all();
        // $request['foto'] = 'wkwkwk';
        // Project::create($request);
        // return redirect('/admin/masterproject');

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
    
            if ($request->file('foto') == null){
                $file = "";
            }else{
                $validatedData['foto'] = $request->file('foto')->store('siswa-project');
            }
            
            Project::create($validatedData);
            return redirect('/admin/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('showproject');
        // $projects = Project::find($id);
        // return view('showproject', ['projects'=>$projects]);
        $siswas=Siswa::find($id)->project()->get();
        return view('showproject', compact('siswas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Project::find('id');
        $siswas = Siswa::all();
        $projects = Project::where('id', $id)->firstorfail();
        return view('editproject', compact('projects'), compact('siswas'));
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
    
            // if ($request->file('foto')){
            //     if($request->oldFoto){
            //         Storage::delete($request->oldFoto);
            //     }
            //     $validatedData['foto'] = $request->file('file')->store('siswa-project');
            //     }
            
            //     $projects=Project::where('id', $id)
            //             ->update($validatedData);
            // return redirect()->route('masterproject.index');

            if($request->file('foto')){
                if($request->oldFoto){
                    Storage::delete($request->oldFoto);
                }
                $validatedData['foto'] = $request->file('foto')->store('siswa-project'); 
            }
    
            $projects=Project::where('id', $id)
                ->update($validatedData);
    
            return redirect()->route('masterproject.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects=Project::find($id)
                ->delete();
        return redirect('admin/masterproject');
    }
}
