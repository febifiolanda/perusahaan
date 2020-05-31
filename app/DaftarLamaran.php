<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Lowongan;
use Detailgroup;

class DaftarLamaran extends Model
{
    protected $table = 'pelamar';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_pelamar';
    protected $fillable=[
        'id_lowongan',
        'id_mahasiswa',
        'status',        
        'isdeleted',
        'created_by' 
    ];
    public function lowongan(){
        return $this->hasMany('App\Lowongan','id_lowongan','id_lowongan') ;
    }
    public function DetailGroup(){
        return $this->hasMany('App\DetailGroup','id_mahasiswa','id_mahasiswa') ;
    }


}
