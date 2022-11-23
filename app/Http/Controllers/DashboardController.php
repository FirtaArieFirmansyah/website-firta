<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Project;
use App\Models\Siswa;
use App\Models\JenisKontak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all()->count();
        $projek = Project::all()->count();
        $kontaks = Kontak::all()->count();
        $jeniskontak = JenisKontak::all()->count();

        return view('dashboard', compact('siswas', 'projek', 'kontaks', 'jeniskontak'));
    }
}