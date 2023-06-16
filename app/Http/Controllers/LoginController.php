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
        $credentials = $request->only('username', 'password', 'role');

        $rememberMe = $request->has('remember_me');

        if (Auth::attempt($credentials, $rememberMe)) {

            // Cookie
            if ($rememberMe == 1) {
                session(['remember_me' => true]);

                setcookie('username', $request->username, time() + 60 * 60 * 24 * 30); // Set cookie selama 30 hari
        
            } else {
                unset($_COOKIE['username']);
            }
            
            $user = Auth::user();
            $role = $user->role;
            $redirectTo = '';

            if ($role === 'borrower') {

                $redirectTo = '/borrower/home';
            } elseif ($role === 'supervisor') {
                $redirectTo = '/supervisor/home';
            } elseif ($role === 'pic') {
                $redirectTo = '/pic/home';
            } elseif ($role === 'admin') {
                $redirectTo = '/admin/home';

            }
                //Sweetalert
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
