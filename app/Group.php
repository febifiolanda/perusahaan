<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
   
    protected $table = 'kelompok';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_kelompok';
    protected $fillable=[
        'id_periode',
        'nama_kelompok',
        'id_dosen',
        'kapasitas',
        'slot',
        'status',
        'isDeleted',
        'created_by',
    ];
    public function detailGroup(){
        return $this->hasMany('App\DetailGroup','id_kelompok','id_kelompok') ;
    }
    public function Periode(){
        return $this->belongsTo('App\Periode','id_periode','id_periode') ;
    }
    public function Lowongan(){
        return $this->belongsTo('App\Lowongan','id_periode','id_periode') ;
    }
}
