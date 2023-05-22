<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    //Variables
    private $validatedData;

    //View Controller
    public function loginPage()
    {
        return view('login.signIn');
    }

    public function registerPage()
    {
        return view('login.signUp');
    }

    //Method buat akun baru
    public function createNewUser(Request $request)
    {
        $this->validatedData = $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal terdiri dari 6 karakter.',
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'Mahasiswa';
        $user->save();

        if ($user->save()) {
            return redirect()->route('login');
        } else {
            return back()->with('error', 'Failed to save the user');
        }
    }

    //Method to Login
    public function validateUser(Request $request)
    {
        $this->validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $username = $request->input('name');
        $password = $request->input('password');
        $role = $request->input('role');

        $user = User::where('name', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            Session::put('loggedIn', true);
            return redirect()->route('dashboard-'.$role);
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
