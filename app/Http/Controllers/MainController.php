<?php

namespace App\Http\Controllers;

use App\Warung;
use Illuminate\Http\Request;

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

        $compacts = ['WarungData'];
        return view('overview', compact($compacts));
    }
}
