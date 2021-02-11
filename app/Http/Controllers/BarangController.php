<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        $validasiWarung = Warung::find($idwarung);
        if ($validasiWarung == null) return redirect()->back(); // jika null
        $barang = new Barang;
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $lokasi_gambar = public_path('img/warung');
            $gambar = $request->file('gambar');
            $new_gambar = time() . $gambar->getClientOriginalName();
            $filename = 'img/warung/' . $new_gambar;
            $gmbr = Image::make($gambar->path());
            $gmbr->resize(201, 174)->save($lokasi_gambar . '/' . $new_gambar);

            $barang->gambar = $filename;
        }
        if ($barang->gambar == null) {
            $barang->gambar = 'img/warung/barang-default.svg';
        }
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

    public function updateBarang(Request $request)
    {
        $request->validate([
            'idbarang' => 'required',
            'e_namabarang' => 'required|string',
            'e_harga' => 'required|integer',
        ]);

        $id = $request->idbarang;
        $barang = Barang::find($id);
        if ($barang == null) return redirect()->back(); // jika null
        $barang->nama = $request->e_namabarang;
        $barang->harga = $request->e_harga;
        $barang->stok = $request->e_stok;
        $barang->save();
        return redirect()->back();
    }

    // public function updateBarang(Request $request)
    // {
    //     $barang = Barang::find($request["id"]);
    //     $barang->nama = $request["nama"];
    //     $barang->harga = $request["harga"];
    //     $barang->deskripsi = $request["deskripsi"];
    //     $barang->gambar = $request["gambar"];
    //     $barang->warung_id = "1";
    //     $barang->status_id = $request["status_id"];
    //     $barang->save();
    //     return redirect('/barang');
    // }

    public function deleteBarang($idwarung,$id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->back();
    }
}
