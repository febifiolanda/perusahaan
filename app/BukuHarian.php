<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuHarian extends Model
{
    protected $table = 'buku_harian';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_buku_harian';
    protected $fillable=[
        'id_mahasiswa', 
        'id_periode',
        'waktu_mulai',
        'waktu_selesai',
        'tanggal',
        'kegiatan',
        'status',
        'isdeleted',
        'created_by'
    ];
   
    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','id_mahasiswa','id_mahasiswa') ;
    }
}
