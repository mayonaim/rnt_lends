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
        $this->validateBorrowRequest($request);

        $borrowRequest = BorrowRequest::create($request->all());

        return redirect()->route('borrower.view_borrowing_requests')->with('success', 'Borrow Request created successfully!');
    }

    public function update(Request $request, $id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);

        if ($request->method() === 'PATCH') {
            $status = $request->input('status');

        if (in_array($status, ['pending', 'approved', 'validated', 'rejected', 'borrowing'])) {
            $borrowRequest->status = $status;
            $borrowRequest->save();
            return back()->with('success', 'Borrow Request status updated successfully!');
        } else {
            return back()->with('error', 'Invalid status value!');
            }
        }

        $this->validateBorrowRequest($request);

        $borrowRequest->update($request->all());

        return back()->with('success', 'Borrow Request updated successfully!');
        
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $borrowRequest = BorrowRequest::findOrFail($id);
        $borrowRequest->delete();

        return back()->with('success', 'Borrow Request deleted successfully!');
    }

    private function validateBorrowRequest(Request $request)
    {
        $request->validate([
            'borrower_id' => 'required',
            'asset_id' => 'required',
            'supervisor_id' => 'required',
            'start_timestamp' => 'required|date',
            'end_timestamp' => 'required|date',
            'activity' => 'required',
            'amount_borrowed' => 'required|numeric|min:0',
            'status' => 'required'
        ]);
    }
}
