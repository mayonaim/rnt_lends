<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\BorrowRequest;
use Illuminate\Support\Facades\Auth;

class BorrowerController extends Controller
{
    protected $borrowerId = Auth::user()->borrower->id;
    public function index()
    {
        return view('peminjam.index');
    }

    public function assets()
    {
        $assets = Asset::all();
        $statusArray = [ 'approved', 'borrowing'];
        $scheduled = BorrowRequest::whereIn('status', $statusArray)->get([ 'asset_id', 'start_timestamp', 'end_timestamp']);
        return view('peminjam.borrow', compact( $this->borrowerId, 'assets', 'scheduled'));
    }

    public function borrowing_requests()
    {
        $borrowRequests = BorrowRequest::where('borrower_id', '=', $this->borrowerId)->get();
        return view('peminjam.manage-borrowing-requests', compact('borrowRequests'));


    }
}
