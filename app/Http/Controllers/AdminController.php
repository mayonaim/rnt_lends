<?php

namespace App\Http\Controllers;

// use App\Models\Admin;
use App\Models\Asset;
use App\Models\AssetImage;
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
        $assets = Asset::all();
        $images = AssetImage::all();
        $pics = PIC::all();
        return view('admin.kelolaAsset', compact('assets', 'images', 'pics'));
    }
}
