<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $login = $request->only('email', 'password');

        if(Auth::attempt($login))
        {
            return redirect()->intended('/');
        }

        return redirect('/login')->with('error', 'Email dan password salah');

    }

    public function logout()
    {

        Auth::logout();
        return redirect('/login');
    }
}
