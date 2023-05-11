<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class AccountController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:6',
            'role' => 'required'
        ], [
            'email.email' => 'Format email tidak valid.',
            'email.required' => 'Email harus diisi.',
            'name.required' => 'Nama harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.'
        ]);

        $account = new Account();
        $account->email = $request->input('email');
        $account->name = $request->input('name');
        $account->password = Hash::make($request->input('password'));
        $account->role = $request->input('role');
        $account->save();

        // Optionally, you can redirect the user or perform any other desired action after successful registration.
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $account = Account::where('username', $username)->first();

        if ($account && Hash::check($password, $account->password)) {
            return redirect()->route('pengusul.home');
        } else {
            return redirect()->back()->with([
                'notifikasi' => 'Akun tidak ditemukan!',
                'type' => 'error'
            ]);
        }
    }
}
