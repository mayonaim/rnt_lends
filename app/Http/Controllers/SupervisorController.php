<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    protected $supervisorId;
    protected $borrowRequests;

    public function __construct()
    {
        $this->supervisorId = Auth::user()->supervisor->id;
        $this->borrowRequests = Auth::user()->supervisor->borrowRequests()->with('asset.pic')->get();
    }
    public function index()
    {
        return view('PenanggungJawab.index');
    }

    public function borrowing_requests()
    {
        return view('PenanggungJawab.manage-borrowing-requests', compact('borrowRequests'));
    }
}
