<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\Warung;

class BarangController extends WarungController
{
    public function createBarang()
    {
        return view('items.create');
    }

    public function store(Request $request, $idwarung)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        
        $barang = new Barang;
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;
        $barang->gambar = $request->gambar;
        $barang->warung_id = $idwarung;
        
        if ($request->stok <= 0) {
            $barang->status_id = 0;
        } else {
            $barang->status_id = 1;
        }
        $barang->stok = $request->stok;

        $saveBarang = $barang->save();
        if ($saveBarang) return redirect()->back(); // jika berhasil
        return redirect()->back();
    }

    public function index()
    {
        $barangs = Barang::get();
        return view('warung.view', compact('barangs'));
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
        $barang->status_id = $request["status_id"];
        $barang->save();
        return redirect('/barang');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }
}
