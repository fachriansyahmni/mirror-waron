<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:warung');
    }
    public function index()
    {
        return view('user.home');
    }

    public function myProfile(Request $request)
    {
        # code...
    }

    public function show($id)
    {
        $akun = Akun::find($id);
        return view('user.show', compact('akun'));
    }

    public function edit($id)
    {
        $akun = Akun::find($id);
        return view('user.edit', compact('akun'));
    }

    public function update(Request $request, $id)
    {
        $akun = Akun::find($id);
        if ($request->has('nama')) {
            $akun->nama = $request->nama;
            $akun->save();
            return redirect()->back()->with('success','success change name');
        } 
    }
    public function savePsswd(Request $request, $id)
    {
        $akun = Akun::find($id);
        if (Hash::check($request->passwordLama, $akun->password)) {
            $akun->password = bcrypt($request->passwordBaru);
            $akun->save();
            return redirect()->back()->with('success','success change password');
        }
        return redirect()->back()->with('error','error change password');
    }
}
