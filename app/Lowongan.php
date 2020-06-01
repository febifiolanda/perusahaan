<?php
//daftar lowongan 
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DaftarLamaran;

class Lowongan extends Model
{
    protected $table = 'lowongan';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_lowongan';
    protected $fillable=[
        'id_periode',
        'id_instansi',
        'pekerjaan',
        'persyaratan',
        'kapasitas',
        'slot',
        'isDeleted',
        'created_by',
    ];

    public function daftarLamaran(){
        return $this->hasMany('App\DaftarLamaran','id_lowongan','id_lowongan') ;
    }
    public function Periode(){
        return $this->hasMany('App\Periode','id_periode','id_periode') ;
    }
}
