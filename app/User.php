<?php

namespace App;

//use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use /*AQUI HasApiTokens,*/ Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'city', 'state', 'admin'];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = ['password'];
}
