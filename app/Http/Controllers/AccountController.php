<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Account;

class AccountController extends Controller
{
    //View Controller
    public function main()
    {
        return view('login.signIn');
    }

    public function signUp()
    {
        return view('login.signUp');
    }

    //Method buat akun baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $account = new Account();

        $account->name = $request->input('name');
        $account->password = Hash::make($request->input('password'));
        $account->role = $request->input('role');
        $account->save();

        if ($account->save()) {
            return redirect()->route('login');
        } else {
            return back()->with('error', 'Failed to save the account');
        }
    }

    //Method to Login
    public function check(Request $request)
    {
        $username = $request->input('name');
        $password = $request->input('password');

        $account = Account::where('name', $username)->first();

        if ($account && Hash::check($password, $account->password)) {
            Session::put('loggedIn', true);
            return redirect()->route('pengusul.pengusul_home');
        } else {
            return back();
        }
    }

    public function isLoggedIn()
    {
        return Session::get('loggedIn') === true;
    }


    public function logout()
    {
        Session::forget('loggedIn');
        Session::flush(); // Optional: Clear all session data

        // Redirect the user to the login page or any other desired destination
        return redirect()->route('login');
    }
}
