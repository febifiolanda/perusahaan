<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'instansi';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_instansi';
    protected $fillable=[
        'id_users',
        'nama',
        'deskripsi',
        'email',
        'alamat',
        'website',
        'slot',
        'kapasitas',
        'status',
        'foto',
        'isBlacklist',
        'isDeleted',
        'created_by'
    ];

    public function users(){
        return $this->belongsTo('App\User', 'id_users');
    }
}
