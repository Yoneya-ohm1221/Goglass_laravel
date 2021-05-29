<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ADMIN_TYPE = 2;
    const DEFAULT_TYPE = 1;
    
    public function isAdmin(){
    return $this->usertypeID === self::ADMIN_TYPE;
}

    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $fillable = [
        'fristname',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = false;

    
    
    public function getAuthIdentifierName()
    {
        return 'username';
    }
    
  
}
