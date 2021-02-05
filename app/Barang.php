<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'nama', 'gambar', 'harga','stok', 'warung_id','status_id','deskripsi'
    ];

    public $timestamps = false;
}
