<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $primaryKey = 'id_users';
    protected $table = 'users';
    public $timestamps = true;

    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
        'id_roles',
        'isDeleted',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token', 'isDeleted', 'created_at', 'created_by', 'updated_at', 'updated_by',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mahasiswa(){
        return $this->hasOne(Mahasiswa::class,'id_users');
    }
    public function instansi(){
        return $this->hasOne('App\Profile','id_users');
    }
}

