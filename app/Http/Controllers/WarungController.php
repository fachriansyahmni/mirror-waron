<?php

namespace App\Http\Controllers;

use App\KategoriWarung;
use Illuminate\Http\Request;
use App\Warung;
use App\Barang;
use Illuminate\Support\Facades\Auth;

class WarungController extends AkunController
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
    public function getProvName($id)
    {
        $urlDataProvinsi = "https://dev.farizdotid.com/api/daerahindonesia/provinsi"; //ambil semua data provinsi
        $getDataProvinsi = json_decode(file_get_contents($urlDataProvinsi), true);
        $key = array_search($id, array_column($getDataProvinsi['provinsi'], 'id'));
        $name = $getDataProvinsi['provinsi'][$key]['nama'];
        return $name;
    }
    public function getKotaName($idProv, $idKota)
    {
        $urlDatakota = "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" . $idProv; //ambil semua data provinsi
        $getDatakota = json_decode(file_get_contents($urlDatakota), true);
        $key = array_search($idKota, array_column($getDatakota['kota_kabupaten'], 'id'));
        $name = $getDatakota['kota_kabupaten'][$key]['nama'];
        return $name;
    }
    public function getKecName($idKota, $idKecamatan)
    {
        $urlDataKecamatan = "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" . $idKota; //ambil semua data provinsi
        $getDataKecamatan = json_decode(file_get_contents($urlDataKecamatan), true);
        $key = array_search($idKecamatan, array_column($getDataKecamatan['kecamatan'], 'id'));
        $name = $getDataKecamatan['kecamatan'][$key]['nama'];
        return $name;
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

        $koor = explode(",", $DataWarung->koordinat);

        if ($request->has('submitedit')) {
            dd($request);
        }

        $compacts = ['DataWarung', 'koor'];

        return view('warung.edit', compact($compacts));
    }

    public function view($idwarung)
    {
        $DataWarung = $this->getDataWarung()->where('id', $idwarung)->first();
        if ($DataWarung == null) return redirect()->back()->with('error', 'not valid'); // validasi warung jika tidak ada

        //get nama provinsi, nama kota, nama kecamatan
        $DataWarung->nama_provinsi = $this->getProvName($DataWarung->prov_id);
        $DataWarung->nama_kota = $this->getKotaName($DataWarung->prov_id, $DataWarung->kabkot_id);
        $DataWarung->nama_kecamatan = $this->getKecName($DataWarung->kabkot_id, $DataWarung->kec_id);

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

    // public function edit($id)
    // {
    //     $barang = Barang::find($id);
    //     return view('items.edit', compact('barang'));
    // }

    // public function updateBarang(Request $request)
    // {
    //     $barang = Barang::find($request["id"]);
    //     $barang->nama = $request["nama"];
    //     $barang->harga = $request["harga"];
    //     $barang->deskripsi = $request["deskripsi"];
    //     $barang->gambar = $request["gambar"];
    //     $barang->warung_id = "1";

    //     if ($request->stok <= 0) {
    //         $barang->status_id = 0;
    //     } else {
    //         $barang->status_id = 1;
    //     }
    //     $barang->stok = $request->stok;

    //     $barang->save();
    //     return redirect('/my-warung' . '/' . $request["warung_id"]);
    //     //note : bug return
    // }

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
