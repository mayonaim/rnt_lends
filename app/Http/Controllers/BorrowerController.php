<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\BorrowRequest;
use Illuminate\Support\Facades\Auth;

class BorrowerController extends Controller
{
    protected $borrowerId;
    protected $assetController;
    protected $borrowRequestController;

    public function __construct(AssetController $assetController, BorrowRequestController $borrowRequestController)
    {
        $this->borrowerId = Auth::user()->id;
        $this->assetController = $assetController;
        $this->borrowRequestController = $borrowRequestController;
    }

    public function index()
    {
        return view('peminjam.index');
    }

    public function assets()
    {
        $assets = $this->assetController->index()['assets'];

        $borrowRequests = $this->borrowRequestController->index()['borrowRequests'];
        $statusFilter = ['approved', 'borrowing'];
        $booked = $borrowRequests->whereIn('status', $statusFilter)->get(['asset_id', 'start_timestamp', 'end_timestamp']);

        return view('peminjam.borrow', compact('assets', 'booked'));
    }

    public function borrowing_requests()
    {
        $borrowRequests = $this->borrowRequestController->index()['borrowRequests'];
        $filteredRequests = $borrowRequests->where('borrower_id', $this->borrowerId)->get();

        return view('peminjam.manage-borrowing-requests', compact('filteredRequests'));
    }
}
