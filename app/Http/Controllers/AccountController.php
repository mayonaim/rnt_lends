<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class AccountController extends Controller
{
    public function main()
    {
        return view('login.main');
    }

    public function signUp()
    {
        return view('login.signUp');
    }

    public function check(Request $request)
    {
        $username = $request->input('name');
        $password = $request->input('password');

        $account = Account::where('name', $username)->first();

        if ($account && Hash::check($password, $account->password)) {
            return redirect()->route('pengusul.pengusul_home');
        } else {
            return back();
        }
    }

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
            return redirect('/login');
        } else {
            return back()->with('error', 'Failed to save the account');
        }
    }
}
