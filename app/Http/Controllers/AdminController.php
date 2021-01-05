<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
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
}
