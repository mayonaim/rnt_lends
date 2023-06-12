<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\BorrowRequest;

class BorrowerController extends Controller
{
    protected $borrowerId;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->borrowerId = Auth::user()->borrower->id;
            return $next($request);
        });
    }

    public function home()
    {
        return view('Peminjam.home');
    }

    public function assets()
    {
        return view('Peminjam.assets');
    }

    public function borrowRequests()
    {
        return view('Peminjam.borrowing-requests');
    }


    private function getBorrowRequests()
    {
        $borrowRequests = BorrowRequest::query()
            ->with('asset.image')
            ->where('borrower_id', $this->borrowerId)
            ->get();

        return response()->json(['borrowRequests' => $borrowRequests]);
    }
}
