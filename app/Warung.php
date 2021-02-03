<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warung extends Model
{
    protected $fillable = [
        'nama_warung', 'pemilik', 'no_hp', 'foto', 'alamat', 'koordinat', 'kategori_id', 'akun_id', 'kec_id', 'kabkot_id', 'prov_id', 'is_active'
    ];

    //public $timestamps = false;

    public function owner()
    {
        return $this->hasOne(Akun::class, 'id', 'pemilik');
    }
    public function kategori()
    {
        return $this->hasOne(KategoriWarung::class, 'id', 'kategori_id');
    }
}
