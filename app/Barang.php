<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'nama', 'gambar', 'harga', 'warung_id', 'status_id'
    ];
}
