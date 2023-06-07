<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class AssetController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'pic_id' => 'required|exists:people_in_charge,id',
            'images.*' => 'required|image|max:2048', // Maximum file size of 2MB for each image
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $asset = Asset::create($validator->validated());

            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('assets', $imageName, 'public');

                $assetImage = new AssetImage([
                    'name' => $imageName,
                ]);

                $asset->images()->save($assetImage); // Associate the AssetImage with the Asset
            }

            DB::commit();

            return redirect()->back()->with('success', 'Asset inserted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while inserting the asset');
        }
    }

    public function update(Request $request, Asset $asset)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'pic_id' => 'required|exists:people_in_charge,id',
            'images.*' => 'nullable|image|max:2048', // Maximum file size of 2MB for each image
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        try {
            DB::beginTransaction();

            $asset->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'category' => $validatedData['category'],
                'stock' => $validatedData['stock'],
                'pic_id' => $validatedData['pic_id'],
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = $image->hashName();
                    $imagePath = public_path('storage/assets/' . $imageName);

                    Image::make($image)
                        ->resize(800, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->save($imagePath, 80);

                    $assetImage = new AssetImage([
                        'name' => $imageName,
                    ]);

                    $asset->images()->save($assetImage);
                }
            }

            if ($request->has('deleteImages')) {
                $deletedImages = $request->input('deleteImages');
                $asset->images()->whereIn('id', $deletedImages)->delete();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Asset updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while updating the asset');
        }
    }
    public function destroy(Asset $asset)
    {
        // Delete the associated images and remove the files from storage
        $asset->images->each(function ($image) {
            Storage::disk('public')->delete('assets/' . $image->name);
            $image->delete();
        });

        // Delete the asset
        $asset->delete();

        return redirect()->back()->with('success', 'Asset deleted successfully');
    }
    public function uploadAssetImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:2048', // Maximum file size of 2MB for the image
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();

            $uploadedImage = Image::make($image);
            $uploadedImage->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagePath = 'assets/' . $imageName;

            Storage::disk('public')->put($imagePath, $uploadedImage->encode());

            $assetImage = new AssetImage([
                'name' => $imageName,
            ]);
            $assetImage->save();

            return response()->json(['image_id' => $assetImage->id], 200);
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }
}
