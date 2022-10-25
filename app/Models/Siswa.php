<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    protected $table = 'Siswa';
    
    public function project(){
        return $this->hasMany('App\Models\Project', 'id_siswa');
    }
    
    public function kontak(){
        return $this->belongsToMany('App\Models\Kontak', 'id_siswa')->withPivot('deskripsi');
    }
}
