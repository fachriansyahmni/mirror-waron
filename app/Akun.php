<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    protected $guard = 'warung';
    protected $fillable = [
        'username', 'nama', 'password'
    ];
    protected $hidden = [
        'password'
    ];
}
