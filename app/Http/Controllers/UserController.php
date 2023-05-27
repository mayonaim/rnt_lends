<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Events\UserCreated;

class UserController extends Controller
{

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        // Create a new user instance
        $user = User::create([
            'username' => $validatedData['username'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // You can optionally log in the user after creating the account
        // Auth::login($user);

        // Redirect to the user's profile or desired page
        return redirect()->intended('/');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password', 'role');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $role = $credentials['role'];
            return redirect()->intended(route($role.'.dashboard'));
        }

        return back()->withErrors([
            'username' => 'User tidak ditemukan.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
