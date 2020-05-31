<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Periode;
class InputNilai extends Model
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
    public function Periode(){
        return $this->hasMany('App\Periode','id_periode','id_periode') ;
    }
}
