<?php

namespace App\Http\Controllers;

// use App\Models\Admin;
use App\Models\Asset;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.dashboard');
    }

    public function assetIndex()
    {
        $assets = Asset::all();

        return view('admin.kelolaAsset', ['assets' => $assets]);
    }

    public function createAsset(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'pic_id' => 'required|exists:pics,id',
        ]);

        // Create a new asset instance
        $asset = Asset::create($validatedData);

        // Optionally, you can perform additional operations or validation here

        // Redirect to the asset index page or desired page
        return redirect()->route('admin.kelolaAsset');
    }

    public function store(Request $request)
    {
        $asset = Asset::create($request->all());
        return redirect()->route('assets.index')->with('success', 'Asset created successfully');
    }

    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    public function update(Request $request, Asset $asset)
    {
        $asset->update($request->all());
        return redirect()->route('assets.index')->with('success', 'Asset updated successfully');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Asset deleted successfully');
    }
}
