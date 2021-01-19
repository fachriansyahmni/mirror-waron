<?php

namespace App\Http\Controllers;

use App\KategoriWarung;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function getAllCategory()
    {
        return KategoriWarung::get();
    }

    public function index()
    {
        return view('admin.dash_admin');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function manage()
    {
        return view('admin.manage');
    }
    public function mancat(Request $request)
    {

        if ($request->has('submit_new_category')) {
            //aksi setelah submit kategori baru
            $request->validate([
                'n_name_category' => 'required'
            ]);
            $newCategory = new KategoriWarung([
                'kategori' => $request->n_name_category
            ]);
            $save = $newCategory->save();
            if ($save) return redirect()->back(); //jika berhasil diinsert
            return redirect()->back();
        }
        $getAllCategory = $this->getAllCategory();
        $compacts = ['getAllCategory'];;
        return view('admin.mancat', compact($compacts));
    }
}
