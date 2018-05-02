<?php

/**
 * @file User.php
 */
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

/**
 * @class User
 */
class User extends Authenticatable //automatically created by Laravel
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function users(){
        $users=DB::table('users')->get();
        //dd($users);
        return $users;        
    }
}