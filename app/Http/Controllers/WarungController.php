<?php

namespace App\Http\Controllers;

use App\KategoriWarung;
use Illuminate\Http\Request;
use App\Warung;
use App\Barang;
use Illuminate\Support\Facades\Auth;

class WarungController extends Controller
{
    function getdataAuth()
    {
        return Auth::user();
    }
    public function getAllCategory()
    {
        return KategoriWarung::get();
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
        $getAllCategoryWarung = $this->getAllCategory();
        if ($request->has('submitwarung')) {
            $request->validate([
                'nama_warung' => 'required',
                'no_hp' => 'required',
                'prov' => 'required|integer',
                'kabkot' => 'required|integer',
                'kec' => 'required|integer',
                'jenis' => 'required|integer',
            ]);
            $warung = new Warung;
            $warung->nama_warung = $request->nama_warung;
            $warung->pemilik = $this->getdataAuth()->id;
            $warung->alamat = $request->alamat;
            $warung->no_hp = $request->no_hp;
            $warung->foto = $request["foto"];
            $warung->koordinat = $request->koordinat;
            $warung->kategori_id = $request->jenis;
            $warung->akun_id = $this->getdataAuth()->id;
            $warung->kec_id = $request->kec;
            $warung->kabkot_id = $request->kabkot;
            $warung->prov_id = $request->prov;
            $warung->is_active = 0;
            $warung->save();
            return redirect()->route('user.warung')->with('success', 'berhasil');
        }
        $compacts = ['getAllCategoryWarung'];
        return view('warung.create', compact($compacts));
    }

    public function manage(Request $request, $idWarung)
    {
        $DataWarung = $this->getDataWarung()->where('id', $idWarung)->first();
        if ($DataWarung == null) return redirect()->back()->with('error', 'not valid'); // validasi warung jika tidak ada

        if ($request->has('submitedit')) {
            dd($request);
        }

        $compacts = ['DataWarung'];

        return view('warung.edit', compact($compacts));
    }

    public function view($idwarung)
    {
        $DataWarung = $this->getDataWarung()->where('id', $idwarung)->first();
        if ($DataWarung == null) return redirect()->back()->with('error', 'not valid'); // validasi warung jika tidak ada

        //barang
        $barangs = Barang::inRandomOrder()->where('warung_id', $idwarung)->get();

        $compacts = ['DataWarung', 'barangs'];
        return view('warung.view', compact($compacts));
    }

    public function show($id)
    {
        $barang = Barang::find($id);
        return view('items.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('items.edit', compact('barang'));
    }

    public function update(Request $request)
    {
        $barang = Barang::find($request["id"]);
        $barang->nama = $request["nama"];
        $barang->harga = $request["harga"];
        $barang->deskripsi = $request["deskripsi"];
        $barang->gambar = $request["gambar"];
        $barang->warung_id = "1";

        if ($request->stok <= 0) {
            $barang->status_id = 0;
        } else {
            $barang->status_id = 1;
        }
        $barang->stok = $request->stok;

        $barang->save();
        return redirect('/my-warung' . '/' . $request["warung_id"]);
        //note : bug return
    }

    public function editStok($id)
    {
        $barang = Barang::find($id);
        return view('items.editStok', compact('barang'));
    }

    public function updateStok(Request $request)
    {
        $barang = Barang::find($request->id);
        if ($request->stok <= 0) {
            $barang->status_id = 0;
        } else {
            $barang->status_id = 1;
        }
        $barang->stok = $request->stok;

        $barang->save();
        return redirect('/my-warung' . '/' . $request->warung_id);
        //note : bug return
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/my-warung' . '/' . $request["warung_id"]);
        //note : bug return
    }
}
