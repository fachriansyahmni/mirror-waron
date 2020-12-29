<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KabKot extends Model
{
    protected $fillable = [
        'nama_kabkot',
    ];
    public $timestamps = false;
}
