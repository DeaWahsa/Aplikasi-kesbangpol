<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login-page');
    }
     public function authenticate(Request $request)
    {
        $credentials = Validator::make(
            $request->all(),
            [
                'user_name' => 'required',
                'password' => 'required|min:4',
            ],
            [
                'user_name.required' => 'username harus diisi!',
                'password.required' => 'Password harus diisi!',
                'password.min' => 'Password minimal 8 karakter!',
            ]
        );

        if ($credentials->fails()) {
            return redirect('/')
                ->withErrors($credentials)
                ->withInput();
        }
        $credentials = request()->validate([
            'user_name' => 'required',
            'password' => 'required|min:4',
        ]);
 
        User::where('user_name', $request->user_name)->update([
            'last_login' => Carbon::now(),
            'ip_address' => request()->ip()
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('successLogin', 'Anda berhasil login');
        }

        return redirect('login-page')->with('loginError', 'username atau password anda salah, silahkan masukkan username dan
                            password dengan benar.')->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
 
        return redirect('/');
    }
}
