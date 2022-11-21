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
    public function store(Request $request, Project $masterproject)
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
    
            // if ($request->file('foto') == null){
            //     $file = "";
            // }else{
            //     $validatedData['foto'] = $request->file('foto')->store('siswa-project');
            // }
            
            // Project::create($validatedData);
            // return redirect('/admin/masterproject');

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $foto = time() . "_" . $file->getClientOriginalName();
                $save_db_foto = 'masterproject/' . $foto;
    
                $dir = public_path('img/admin/masterproject');
                if (!file_exists($dir)) mkdir($dir);
    
                $file->move($dir, $foto);
            }else{
                $save_db_foto = 'default.jpg';
            }
    
            $validatedData['foto'] = $save_db_foto;
    
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
    public function update(Request $request, Project $masterproject)
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

            if ($request->hasFile('foto')) {
                if ($masterproject->foto != 'default.jpg') {
                    $old_foto = public_path('img/admin/' . $masterproject->foto);
                    if (file_exists($old_foto)) unlink($old_foto);
                }

            $file = $request->file('foto');
            $foto = time() . "_" . $file->getClientOriginalName();
            $save_db_foto = 'masterproject/' . $foto;

            $dir = public_path('img/admin/masterproject');
            $file->move($dir, $foto);
            $validatedData['foto'] = $save_db_foto;
        }

        $masterproject->update($validatedData);

        return redirect()->route('masterproject.index');
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
