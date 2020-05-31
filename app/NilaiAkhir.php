<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{  
    protected $table = 'nilai';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_nilai';
}
