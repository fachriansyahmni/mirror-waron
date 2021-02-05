<?php

namespace App\Http\Controllers;

use App\Warung;
use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getDataWarungActive($id)
    {
        return Warung::where('id', $id)->where('is_active', 1);
    }
    public function getAllWarungActive()
    {
        return Warung::where('is_active', 1);
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

    public function cariPage(Request $request)
    {
        // $request->validate([
        //     'q' => 'required',
        //     'type' => 'required',
        // ]);
        if (isset($request->q)) {
            $querySearch = $request->q;
        } else {
            $querySearch = " ";
        }

        if (isset($request->type)) {
            $typeSearch = $request->type;
        } else {
            $typeSearch = "warung";
        }
        switch ($typeSearch) {
            case "warung":
                $dbSearch = "warungs";
                break;
            default:
                $dbSearch = "warungs";
                break;
        }

        $table = DB::table($dbSearch);
        switch ($typeSearch) {
            case "warung":
                $table->join('kategori_warungs', $dbSearch . '.kategori_id', '=', 'kategori_warungs.id');
                $table->select($dbSearch . '.*', 'kategori_warungs.id as kategId');
                $table->where('is_active', 1);
                $table->where(function ($query) use ($querySearch) {
                    $query->where('nama_warung', 'LIKE', '%' . $querySearch . '%')
                        ->orWhere('kategori', 'LIKE', '%' . $querySearch . '%');
                });
                // $table->where('nama_warung', 'LIKE', '%' . $querySearch . '%')->orWhere('kategori', 'LIKE', '%' . $querySearch . '%');
                if (isset($request->category)) {
                    $table->where('kategori_id', $request->category);
                }
                break;
            default:

                break;
        }
        $hasil = $table->get();
        $compacts = ['hasil'];

        // $getWarungActive = $this->getAllWarungActive()->paginate(15);

        // $hasil = array_push($compacts, 'getWarungActive');
        return view('search', compact($compacts));
    }
    public function warungByKategori($id)
    {
        return Warung::where('kategori_id', $id)->get();
    }
    public function warungOverview($id)
    {
        $WarungData = $this->getDataWarungActive($id)->first();
        $WarungData->nama_provinsi = $this->getProvName($WarungData->prov_id);
        $WarungData->nama_kota = $this->getKotaName($WarungData->prov_id, $WarungData->kabkot_id);
        $WarungData->nama_kecamatan = $this->getKecName($WarungData->kabkot_id, $WarungData->kec_id);
        if ($WarungData == null) return redirect()->back();
        $koor = explode(",", $WarungData->koordinat);
        $barangs = DB::table('barangs')->where('warung_id', $WarungData['id'])->get();
        $compacts = ['WarungData', 'barangs', 'koor'];
        return view('overview', compact($compacts));
    }
}
