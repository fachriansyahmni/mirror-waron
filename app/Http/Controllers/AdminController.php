<?php

namespace App\Http\Controllers;

use App\KategoriWarung;
use App\Warung;
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
    public function getAllWarung()
    {
        return Warung::paginate(20);
    }
    public function getAllWarungActive()
    {
        return Warung::where('is_active', 1);
    }
    public function getAllWarungNotActive()
    {
        return Warung::where('is_active', 0);
    }

    public function index()
    {
        return view('admin.dash_admin');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function manage(Request $request)
    {
        $getAllWarung = $this->getAllWarung();
        // $getWarungActive = $this->getAllWarungActive()->get();
        $getWarungNotActive = $this->getAllWarungNotActive()->get();

        $compacts = ['getAllWarung', 'getWarungNotActive'];

        if ($request->has('q')) {
            return "cari";
        }

        return view('admin.manage', compact($compacts));
    }

    public function warungActivation()
    {
        $getWarungNotActive = $this->getAllWarungNotActive()->orderBy('created_at', 'DESC')->get();

        $compacts = ['getWarungNotActive'];
        return view('admin.activation-warung', compact($compacts));
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
