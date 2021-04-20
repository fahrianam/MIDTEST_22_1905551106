<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matkul_pilihan_mahasiswa extends Model
{
    protected $table = "tb_matkul_pilihan_mahasiswa";

    public function RelasiMahasiswa(){
        return $this->belongsTo(mahasiswa::class,'mahasiswa_id');
    }

    public function RelasiMataKuliah(){
        return $this->belongsTo(mata_kuliah::class,'mata_kuliah_id');
    }
}
