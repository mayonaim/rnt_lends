<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Asset;
use App\Models\PIC;
use App\Http\Controllers\BorrowRequestController;

class AdminController extends Controller
{
    protected $borrowRequestController;

    public function __construct(BorrowRequestController $borrowRequestController)
    {
        $this->borrowRequestController = $borrowRequestController;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function assets()
    {
        $assets = Asset::with('pic', 'images')->get();
        $pics = PIC::all();

        return view('admin.manage-assets', compact('assets', 'pics'));
    }

    public function borrowing_requests()
    {
        $borrowRequests = $this->borrowRequestController->index()['borrowRequests'];

        return view('admin.manage-borrowing-requests', compact('borrowRequests'));
    }
}
