<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warung;
use Illuminate\Support\Facades\Auth;

class WarungController extends Controller
{
    function getdataAuth()
    {
        return Auth::user();
    }

    public function getDataWarung()
    {
        return Warung::where('pemilik', $this->getdataAuth()->id);
    }

    public function warung()
    {
        $compacts = [];

        $getMyWarung = $this->getDataWarung()->get();
        array_push($compacts, 'getMyWarung');
        return view('warung.index', compact($compacts));
    }

    public function create(Request $request)
    {
        // return view('register_warung.create');
        if ($request->has('submitwarung')) {
            $warung = new Warung;
            $warung->nama_warung = $request["nama_warung"];
            $warung->pemilik = $this->getdataAuth()->id;
            $warung->alamat = $request["alamat"];
            $warung->no_hp = $request["no_hp"];
            $warung->foto = $request["foto"];
            $warung->koordinat = $request["koordinat"];
            $warung->kategori_id = 1;
            $warung->akun_id = 1;
            $warung->kec_id = 1;
            $warung->kabkot_id = 1;
            $warung->prov_id = 1;
            $warung->is_active = 0;
            $warung->save();
            return redirect()->route('user.warung')->with('success', 'berhasil');
        }
        return view('warung.create');
    }
}
