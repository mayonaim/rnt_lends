<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['user.borrower', 'user.supervisor', 'user.pic']);

        return ['users' => $users];
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validateUser($request);

        $user = User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('home')->with('success', 'Registration successful! Please log in.');
    }

    public function update(Request $request, $id)
    {
        

        $user = User::findOrFail($id);
        $userRole = $user->role;

        $user->update([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
<<<<<<< HEAD
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
        ]);

        return back()->with( 'success', 'User succesfully updated');
=======
            'role' => $userRole,
        ]);

        if ($request->input('name') || $request->input('phone')) {
            $userData['name'] = $request->input('name');
            $userData['phone'] = $request->input('phone');
        };

        $user->save();

        switch ($userRole) {
            case 'borrower':
                $user->borrower()->update($userData);
                break;
            case 'supervisor':
                $user->supervisor()->update($userData);
                break;
            case 'pic':
                $user->pic()->update($userData);
                break;
            case 'admin':
                $user->admin()->update($userData);
                break;
        };

        return back()->with('success', 'User succesfully updated');

>>>>>>> db405c1d51145df02dd1083f6046e51c38255a81
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('success', 'User succesfully deleted');
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
