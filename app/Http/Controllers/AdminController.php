<?php

namespace App\Http\Controllers;

use App\KategoriWarung;
use App\Warung;
use App\Admin;
use App\Akun;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        return $this->getAllWarung()->where('is_active', 1);
    }
    public function getWarungByProv($prov_id)
    {
        return Warung::where('prov_id', $prov_id);
    }
    public function getAllWarungNotActive()
    {
        return Warung::where('is_active', 0);
    }

    public function getProvName($id)
    {
        $urlDataProvinsi = "https://dev.farizdotid.com/api/daerahindonesia/provinsi"; //ambil semua data provinsi
        $getDataProvinsi = json_decode(file_get_contents($urlDataProvinsi), true);
        $key = array_search($id, array_column($getDataProvinsi['provinsi'], 'id'));
        $name = $getDataProvinsi['provinsi'][$key]['nama'];
        return $name;
    }

    public function index(Request $request)
    {
        $getWarungNotActive = $this->getAllWarungNotActive()->get();
        $this->data['getAllWarung'] = [];
        if ($request->has('prov')) {
            $this->data['getAllWarung'] = $this->getWarungByProv($request->prov)->get();
            foreach ($this->data['getAllWarung'] as $warung) {
                $warung->nama_provinsi = $this->getProvName($warung->prov_id);
            }
        }
        $compacts = ['getWarungNotActive'];
        return view('admin.dash_admin', $this->data, compact($compacts));
    }
    public function profile()
    {
        $this->data['getWarungNotActive'] = $this->getAllWarungNotActive()->get();
        return view('admin.profile', $this->data);
    }
    public function manage(Request $request)
    {
        $getAllWarung = $this->getAllWarungActive();
        $getWarungNotActive = $this->getAllWarungNotActive()->get();

        $compacts = ['getAllWarung', 'getWarungNotActive'];

        if ($request->has('q')) {
            return "cari";
        }
        return view('admin.manage', compact($compacts));
    }

    public function warungActivation(Request $request)
    {
        if ($request->has('confirm-warung')) {
            $request->validate([
                'warungId' => 'required|integer'
            ]);
            $getWarung = Warung::find($request->warungId);
            if ($getWarung == null) return redirect()->back(); //jika data warung tidak ditemukan akan redirect 

            $updateActivated = $getWarung->update(['is_active' => 1]);
            if ($updateActivated) return redirect()->back()->with('success', 'berhasil diupdate');
            return redirect()->back();
        }

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
        $compacts = ['getAllCategory'];

        $this->data['getWarungNotActive'] = $this->getAllWarungNotActive()->get();

        //getWarung
        $warung = Warung::all();
        return view('admin.mancat', $this->data, compact($compacts, 'warung'));
    }

    public function edit($id)
    {
        $category = KategoriWarung::find($id);
        $this->data['getWarungNotActive'] = $this->getAllWarungNotActive()->get();
        return view('admin.edit_mancat', $this->data, compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = KategoriWarung::find($id);
        $category->kategori = $request["kategori"];
        if ($category->save()) return redirect()->route('admin.mancat')->with('success', 'kategori berhasil diubah');
        return redirect()->route('admin.mancat')->with('error', 'gagal mengubah kategori');
    }

    public function resetPsswd()
    {
        $this->data['getWarungNotActive'] = $this->getAllWarungNotActive()->get();
        return view('admin.resetPassword', $this->data);
    }

    public function savePsswd(Request $request, $id)
    {
        $akun = Admin::find($id);
        if (Hash::check($request->passwordLama, $akun->password)) {
            $akun->password = bcrypt($request->passwordBaru);
            $akun->save();
            return redirect()->back()->with('success', 'berhasil merubah password');
        }
        return redirect()->back()->with('error', 'password lama anda salah');
    }

    public function resetOwner()
    {
        $akuns = Akun::get();
        $this->data['getWarungNotActive'] = $this->getAllWarungNotActive()->get();
        return view('admin.resetPasswordOwner', $this->data, compact('akuns'));
    }

    public function resetPsswdOwner($id)
    {
        $this->data['getWarungNotActive'] = $this->getAllWarungNotActive()->get();
        return view('admin.formResetPasswordOwner', $this->data, compact('id'));
    }

    public function savePsswdOwner(Request $request, $id)
    {
        $akun = Akun::find($id);
        $akun->password = bcrypt($request->passwordBaru);
        $akun->save();
        return redirect()->back()->with('success', 'berhasil merubah password');
    }
}
