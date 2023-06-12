<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with([ 'user.borrower', 'user.supervisor', 'user.pic']);

        return Response::json(['users' => $users]);
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $this->validateUser($request);

        $user = User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    public function update(Request $request, $id)
    {
        $this->validateUser($request);

        $user = User::findOrFail($id);

        $user->update([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);

        $user->save();

        return back()->with( 'success', 'User succesfully updated');;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with( 'success', 'User succesfully deleted');
    }

    private function validateUser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:borrower,supervisor,pic,admin',
        ]);
    }
}
