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
        dd($id);
    }
    public function warungOverview($id)
    {
        $WarungData = $this->getDataWarungActive($id)->first();
        if ($WarungData == null) return redirect()->back();
        
        $koor = explode(",",$WarungData->koordinat);
        $barangs = DB::table('barangs')->where('warung_id', $WarungData['id'])->get(); 
        $compacts = ['WarungData','barangs','koor'];
        
        return view('overview', compact($compacts));
    }
}
