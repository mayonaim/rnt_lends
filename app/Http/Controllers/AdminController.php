<?php

namespace App\Http\Controllers;

// use App\Models\Admin;
use App\Models\Asset;
use App\Models\PIC;
// use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.dashboard');
    }

    public function assets()
    {
        $assets = Asset::with('pic', 'image')->get();
        $pics = PIC::all();
        return view('admin.kelolaAsset', compact('assets','pics'));
    }
}
