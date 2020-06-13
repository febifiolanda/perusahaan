<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_nilai';
    protected $fillable=[
    'id_periode',
    'id_mahasiswa',
    'id_aspek_penilaian',
    'id_kelompok_penilai',
    'nilai',
    'isDeleted',
    'created_by'
    ];
}
