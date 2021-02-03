<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;

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
        return view('user.show',compact('akun'));
    }

    public function edit($id)
    {
        $akun = Akun::find($id);
        return view('user.edit', compact('akun'));
    }

    public function update(Request $request,$id)
    {
        $akun = Akun::find($request['$id']);
        if($request->has('UpdateNama')){
            $akun->nama = $request->nama;
        }elseif($request->has('UpdatePassword')){
            $akun->password = bcrypt($request->password);
        }else{
            return view('user.show',compact('akun'));
        }
        $akun->save();
        return redirect()->back();
    }

}
