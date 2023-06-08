<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('auth.register');
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        $user = User::create([
            'username' => $validatedData['username'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['password']),
        ]);

        if ($user) {
            return redirect()->intended(route('login'))->with('success', 'User created successfully');
        } else {
            return back()->with('error', 'Failed to create user. Please try again.')->withInput();
        }
    }

    public function destroy(User $user)
    {
        $user->borrower()->delete();
        $user->supervisor()->delete();
        $user->pic()->delete();
        $user->admin()->delete();
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password', 'role');

        if (Auth::attempt($credentials)) {
            $role = $credentials['role'];
            return redirect()->intended(route($role . '.index'));
        }

        return back()->withErrors([
            'username' => 'Invalid username or password',
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
