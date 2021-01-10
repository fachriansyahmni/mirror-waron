<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warung;

class RegisterWarungController extends Controller
{
    public function create()
    {
        return view('register_warung.create');
    }

    public function store(Request $request)
    {
        $warung = new Warung;
        $warung->nama_warung = $request["nama_warung"];
        $warung->pemilik = $request["pemilik"];
        $warung->alamat = $request["alamat"];
        $warung->no_hp = $request["no_hp"];
        $warung->foto = $request["foto"];
        $warung->koordinat = $request["koordinat"];
        $warung->kategori_id = 1;
        $warung->akun_id = 1;
        $warung->kec_id = 1;
        $warung->kabkot_id = 1;
        $warung->prov_id = 1;
        $warung->save();
        return "berhasil register";
    }
}
