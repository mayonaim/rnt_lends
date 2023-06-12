<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\Asset;
use App\Models\BorrowRequest;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with([ 'images', 'pic']);

        return Response::json(['assets' => $assets]);
    }

    public function getBookedAssets()
    {
        $bookedAssets =  BorrowRequest::query()
            ->whereIn('status', ['approved', 'borrowing'])
            ->get(['asset_id', 'start_timestamp', 'end_timestamp'])
            ->toArray();

        return response()->json(['bookedAssets' => $bookedAssets]);
    }

    public function store(Request $request)
    {
        $this->validateAsset($request);

        $asset = Asset::create($request->all());

        return back()->with('success', 'Asset created successfully!');
    }

    public function update(Request $request, $id)
    {
        $this->validateAsset($request);

        $asset = Asset::findOrFail($id);
        $asset->update($request->all());

        return back()->with('success', 'Asset updated successfully!');
    }

    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return back()->with('success', 'Asset deleted successfully!');
    }

    private function validateAsset(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'category' => 'required',
            'pic_id' => 'required|integer',
        ]);
    }
}
