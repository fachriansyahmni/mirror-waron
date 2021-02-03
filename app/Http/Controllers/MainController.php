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
    public function cariPage()
    {
        $compacts = [];

        $getWarungActive = $this->getAllWarungActive()->paginate(15);
        array_push($compacts, 'getWarungActive');
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
