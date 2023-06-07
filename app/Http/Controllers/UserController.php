<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        $user = User::create([
            'username' => $validatedData['username'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->intended(route('login'))->with('success', 'Account created successfully');
    }
    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);

        // Delete the related records
        $user->borrower()->delete();
        $user->supervisor()->delete();
        $user->pic()->delete();
        $user->admin()->delete();

        // Delete the user
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
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
            return redirect()->intended(route($role . '.dashboard'));
        }

        return back()->withErrors([
            'username' => 'Username atau password anda salah'
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
