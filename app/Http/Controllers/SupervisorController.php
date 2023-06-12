<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\BorrowRequest;

class BorrowerController extends Controller
{
    protected $supervisorId;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->supervisorId = Auth::user()->supervisor->id;
            return $next($request);
        });
    }

    public function home()
    {
        return view('PenanggungJawab.home');
    }

    public function assets()
    {
        return view('PenanggungJawab.assets');
    }

    public function borrowRequests()
    {
        return view('PenanggungJawab.borrowing-requests');
    }


    private function getBorrowRequests()
    {
        $borrowRequests = BorrowRequest::query()
            ->with('asset.image')
            ->where('supervisor_id', $this->supervisorId)
            ->get();

        return response()->json(['borrowRequests' => $borrowRequests]);
    }
}
