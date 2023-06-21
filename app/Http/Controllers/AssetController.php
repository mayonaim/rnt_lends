<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


use App\Models\Asset;
use App\Models\AssetImage;

class AssetController extends Controller
{


    public function store(Request $request)
    {
        $this->validateAsset($request);

        $asset = Asset::create($request->all());

        if ($request->has('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {
                $path = $image->store('assets', 'public');

                AssetImage::create([
                    'asset_id' => $asset->id,
                    'name' => $path,
                ]);
            }
        }

        return back()->with('success', 'Asset created successfully!');
    }

    public function update(Request $request, $id)
    {
        $this->validateAsset($request);

        $asset = Asset::findOrFail($id);
        $asset->update($request->all());

        return back()->with('success', 'Asset updated successfully!');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
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
