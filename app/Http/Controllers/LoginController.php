<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function home()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;

            $redirectTo = '/' . $role . '/home';

                session()->flash('notifikasi', 'Login berhasil !');
                session()->flash('type', 'success');

            return redirect()->intended($redirectTo);
        }

        return back()->withErrors([
            'username' => 'Wrong Username',
            'password' => 'Wrong Password',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
