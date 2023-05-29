<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetImage;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'pic_id' => 'required|exists:people_in_charge,pic_id',
            'images.*' => 'required|image|max:2048', // Maximum file size of 2MB for each image
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the asset record
        $asset = Asset::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'stock' => $request->stock,
            'pic_id' => $request->pic_id,
        ]);

        // Process and associate the images
        foreach ($request->file('images') as $image) {
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->store('assets', $imageName, 'public');

            AssetImage::create([
                'asset_id' => $asset->asset_id,
                'name' => $imagePath,
            ]);
        }

        return redirect()->back()->with('success', 'Asset created successfully');
    }

    public function update(Request $request, Asset $asset)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'pic_id' => 'required|exists:people_in_charge,pic_id',
            'images.*' => 'nullable|image|max:2048', // Maximum file size of 2MB for each image
        ]);

        // Update the asset record
        $asset->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'category' => $validatedData['category'],
            'stock' => $validatedData['stock'],
            'pic_id' => $validatedData['pic_id'],
        ]);

        // Process and associate the images
        if ($request->hasFile('images')) {
            // Delete existing images
            $asset->image()->delete();

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('assets', 'public');

                $asset->image()->create([
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Asset updated successfully');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Asset deleted successfully');
    }
}
