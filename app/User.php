<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = true;
    public $table = 'users';

    const ADMIN_TYPE = 'admin';
    const USER_TYPE = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function IsAdmin(){
        return $this->type === self::ADMIN_TYPE;
    }
    public function IsUser(){
        
        return $this->type === self::USER_TYPE;
    }
     public function user() {

        return $this->hasMany('App\User');
    }

    protected $fillable = [
        'firstname','lastname','age','address','phonenumber','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
