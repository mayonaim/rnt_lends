<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class AdminController extends Controller
{

    public function home()
    {
        return view('Admin.home');
    }

    public function assets()
    {
        return view('Admin.assets');
    }

    public function borrowRequests()
    {
        return view('Admin.borrowing-requests');
    }

    public function users()
    {
        return view('Admin.users');
    }

}
