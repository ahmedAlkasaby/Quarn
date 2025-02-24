<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;


class Admin extends Authenticatable implements LaratrustUser
{

    use HasFactory,Notifiable,HasRolesAndPermissions;

    protected $guard = 'admin';


   
    protected $fillable = [
        'name',
        'email',
        'password',
        'created_by',
        'updated_by',
        'active',
        'lang',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
