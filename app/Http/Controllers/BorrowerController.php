<?php

namespace App\Http\Controllers;

// use App\Models\Admin;
use App\Models\Asset;
// use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function home()
    {
        return view('peminjam.dashboard');
    }

    public function assets()
    {
        $assets = Asset::with('pic', 'image')->get();
        return view('peminjam.daftarAsset', compact('assets',));
    }
}
