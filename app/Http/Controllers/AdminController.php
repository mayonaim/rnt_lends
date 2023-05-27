<?php

namespace App\Http\Controllers;

// use App\Models\Admin;
use App\Models\Asset;
// use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.dashboard');
    }

    public function assetIndex()
    {
        $assets = Asset::all();

        return view('admin.kelolaAsset', ['assets' => $assets]);
    }
}
