<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Akun;
use App\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }
    public function username()
    {
        return 'username';
    }

    protected function attemptLogin(Request $request)
    {
        $is_ownerWarung = Akun::where('username', $request->username)->first();
        $is_admin = Admin::where('username', $request->username)->first();

        if ($is_ownerWarung) {
            if (Auth::guard('warung')->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->intended('/dashboard');
            };
        } elseif ($is_admin) {
            if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->intended('/admin');
            };
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }
}
