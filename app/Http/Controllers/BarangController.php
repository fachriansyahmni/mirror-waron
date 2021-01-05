<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;    

class BarangController extends Controller
{
    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $barang = new Barang;
        $barang->nama = $request["nama"];
        $barang->harga = $request["harga"];
        $barang->deskripsi = $request["deskripsi"];
        $barang->gambar = $request["gambar"];
        $barang->warung_id = "1";
        $barang->status_id = $request["status_id"];
        $barang->save();
        return redirect('/barang');
    }

    public function index()
    {
        $barangs = Barang::all();
        return view('items.index', compact('barangs'));
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