<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Asset;
use App\Models\BorrowRequest;

class PICController extends Controller
{
    private $picId;

    public function initialize()
    {
        $this->picId = Auth::user()->pic->id;
    }

    public function home()
    {
        return view('PICLab.home');
    }

    public function assets()
    {
        $this->initialize();
        $picId = $this->picId;
        $assets = Asset::with(['images', 'pic'])->get();

        return view('PICLab.assets', compact('assets',  'picId'));
    }

    public function borrowRequests()
    {
        $this->initialize();
        $picId = $this->picId;
        $assetIds = Asset::where('pic_id', $picId)->pluck('id')->toArray();
        $borrowRequestsAll = BorrowRequest::with(['borrower', 'supervisor', 'asset']);
        $userBorrowRequests = $borrowRequestsAll->whereIn('asset_id', $assetIds)->get();

        return view('PICLab.borrowing-requests', compact('userBorrowRequests', 'picId'));
    }


}
