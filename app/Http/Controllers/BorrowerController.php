<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Asset;
use App\Models\BorrowRequest;
use App\Models\User;

class BorrowerController extends Controller
{
    private $borrowerId;

    public function initialize()
    {
        $this->borrowerId = Auth::user()->borrower->id;
    }

    public function home()
    {
        return view('Peminjam.home');
    }

    public function assets()
    {
        $this->initialize();
        $borrowerId = $this->borrowerId;
        $assets = Asset::with(['images', 'pic'])->get();
        $users = User::with('supervisor')->get();
        $bookedAssets = $this->getBookedAssets();

        return view('Peminjam.assets', compact('assets', 'users', 'bookedAssets', 'borrowerId'));
    }

    public function borrowRequests()
    {
        $this->initialize();
        $borrowerId = $this->borrowerId;
        $borrowRequestsAll = BorrowRequest::with(['borrower', 'supervisor', 'asset'])->get();
        $userBorrowRequests = $borrowRequestsAll->where('borrower_id', $borrowerId);

        return view('Peminjam.borrowing-requests', compact('userBorrowRequests', 'borrowerId'));
    }

    public function getBookedAssets()
    {
        $bookedAssets = BorrowRequest::query()
            ->whereIn('status', ['approved', 'borrowing'])
            ->get(['asset_id', 'start_timestamp', 'end_timestamp'])
            ->toArray();

        return ['bookedAssets' => $bookedAssets];
        dd($bookedAssets);
    }

}
