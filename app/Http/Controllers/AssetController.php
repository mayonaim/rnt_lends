<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('assets.index', compact('assets'));
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
