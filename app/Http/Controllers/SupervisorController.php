<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use Illuminate\Support\Facades\Auth;

class BorrowerController extends Controller
{
    protected $supervisorId = Auth::user()->supervisor->id;

    protected $borrowRequests = BorrowRequest::where('supervisor_id', '=', $this->supervisorId)->get();

    public function index()
    {
        return view('PenanggungJawab.index');
    }
    public function borrowing_requests()
    {
        return view('PenanggungJawab.manage-borrowing-requests', compact( $this->borrowRequests));
    }
}
