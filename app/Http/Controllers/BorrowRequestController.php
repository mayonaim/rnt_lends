<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\BorrowRequest;

class BorrowRequestController extends Controller
{
    public function index()
    {
        $borrowRequests = BorrowRequest::with([ 'borrower', 'supervisor', 'asset.image', 'asset.pic']);

        return Response::json(['borrowRequests' => $borrowRequests]);
    }

    public function store(Request $request)
    {
        $this->validateborrowRequest($request);

        $borrowRequest = BorrowRequest::create($request->all());

        return back()->with('success', 'Borrow Request created successfully!');
    }

    public function update(Request $request, $id)
    {
        $this->validateborrowRequest($request);

        $borrowRequest = BorrowRequest::findOrFail($id);
        $borrowRequest->update($request->all());

        return back()->with('success', 'Borrow Request updated successfully!');
    }

    public function destroy($id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);
        $borrowRequest->delete();

        return back()->with('success', 'Borrow Request deleted successfully!');
    }
    private function validateBorrowRequest(Request $request)
    {
        $request->validate([
            'asset_id' => 'required',
            'supervisor_id' => 'required',
            'start_timestamp' => 'required|date',
            'end_timestamp' => 'required|date',
            'activity' => 'required',
            'borrowed_amount' => 'required|numeric',
        ]);
    }
}
