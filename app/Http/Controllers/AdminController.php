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
        $borrowRequests = BorrowRequest::with(['borrower', 'supervisor', 'asset']);
        return view('Admin.borrowing-requests', compact('borrowRequests'));
    }

    public function users()
    {
        $users = User::with([ 'pic', 'supervisor', 'borrower'])->get();

        return view('Admin.users', compact('users'));
    }

}
