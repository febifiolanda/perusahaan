<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_periode';

    public function InputNilai(){
        return $this->belongsTo('App\InputNilai','id_periode','id_periode') ;
    }
    public function Group(){
        return $this->hasMany('App\Group','id_periode','id_periode') ;
    }
    public function Lowongan(){
        return $this->hasMany('App\Lowongan','id_periode','id_periode') ;
    }
    public function magang(){
        return $this->hasMany('App\Magang','id_periode','id_periode') ;
    }
}
