<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\BorrowRequest;
use Illuminate\Support\Facades\Auth;

class PICController extends Controller
{
    protected $picId;
    protected $assets;

    public function __construct(Asset $asset)
    {
        $this->picId = Auth::user()->pic->id;
        $this->assets = $asset->with('pic')->where('pic_id', $this->picId)->get();
    }
    public function index()
    {
        return view('PICLab.index');
    }

    public function assets()
    {
        return view('PICLab.manage-assets', ['assets' => $this->assets]);
    }

    public function borrowing_requests()
    {
        $borrowRequests = BorrowRequest::with('asset.pic')
            ->whereIn('asset_id', $this->assets->pluck('id'))
            ->get();

        return view('PICLab.manage-borrowing-requests', compact('borrowRequests'));
    }
}
