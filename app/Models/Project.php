<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'nama_project',
        'deskripsi',
        'foto',
        'tanggal',
    ];
        protected $table = 'project';
        protected $guarded=[];
        public function siswa(){
            return $this->belongsTo('App\Models\Siswa', 'id_siswa');
        }
}
