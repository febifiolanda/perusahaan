<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailGroup extends Model
{
    protected $table = 'kelompok_detail';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_kelompok_detail';
    protected $fillable=[
        'id_kelompok',
        'id_mahasiswa',
        'status_keanggotaan',
        'created_by',
    ];
    
    public function group(){
        return $this->belongsTo('App\Group','id_kelompok','id_kelompok') ;
    }

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','id_mahasiswa','id_mahasiswa') ;
    }
    public function DaftarLamaran(){
        return $this->hasMany('App\DaftarLamaran','id_mahasiswa','id_mahasiswa') ;
    }
}
