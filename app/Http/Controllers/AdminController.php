<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;


use App\Models\Asset;
use App\Models\BorrowRequest;
use App\Models\User;

class AdminController extends Controller
{

    public function home()
    {
        return view('Admin.home');
    }

    public function assets()
    {
        $assets = Asset::with([ 'images', 'pic'])->get();
        $users = User::with('pic')->get();

        return view('Admin.assets', compact('assets', 'users'));
    }

    public function borrowRequests()
    {
        $borrowRequests = BorrowRequest::with('')
        return view('Admin.borrowing-requests');
    }

    public function users()
    {
        return view('Admin.users');
    }

}
