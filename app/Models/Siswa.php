<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kontak;

class Siswa extends Model
{
    use HasFactory;
protected $fillable = [
    'nisn',
    'nama',
    'alamat',
    'email',
    'jk',
    'foto',
    'about',
];
    protected $table = 'siswa';
    
    public function project(){
        return $this->hasMany('App\Models\Project', 'id_siswa');
    }
    
    public function kontaks(){
        return $this->hasMany(Kontak::class, 'siswa_id');
    }
}
