<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    protected $table = 'magang';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_magang';
    protected $fillable=[
    'id_kelompok',
    'id_instansi',
    'id_periode',
    'tanggal_mulai',
    'tanggal_selesai',
    'jobdesk',
    'status',
    'isDeleted',
    'created_by',
    ];
    public function Group(){
        return $this->belongsTo('App\Group','id_kelompok','id_kelompok') ;
    }
    public function detailGroup(){
        return $this->hasMany('App\Group','id_kelompok','id_kelompok') ;
    }
    public function periode(){
        return $this->belongsTo('App\Periode','id_periode','id_periode') ;
    }
}
