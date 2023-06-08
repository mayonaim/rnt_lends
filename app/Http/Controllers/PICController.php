<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\BorrowRequest;
use Illuminate\Support\Facades\Auth;

class BorrowerController extends Controller
{
    protected $picId = Auth::user()->pic->id;

    protected $assets = Asset::where('pic_id', '=', $this->picId);

    public function index()
    {
        return view('PICLab.index');
    }

    public function assets()
    {
        return view('PICLab.manage-assets', compact( $this->assets));
    }

    public function borrowing_requests()
    {
        $borrowRequests = BorrowRequest::whereIn('asset_id', $this->assets)->get();

        return view('PICLab.manage-borrowing-requests', compact( 'borrowRequests'));
    }
}
