<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return ['assets' => $assets];
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'pic_id' => 'required|exists:people_in_charge,id',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        try {
            DB::beginTransaction();

            $asset = Asset::create($validatedData);

            DB::commit();

            return redirect()->back()->with('success', 'Asset inserted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while inserting the asset');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validateData($request);

        try {
            DB::beginTransaction();

            $asset = Asset::findOrFail($id);
            $asset->update($validatedData);

            DB::commit();

            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with( 'error', 'An error occurred while updating the asset');
        }
    }

    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect()->back()->with('success', 'Asset deleted successfully');
    }
}
