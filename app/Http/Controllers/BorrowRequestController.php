<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BorrowRequestController extends Controller
{
    public function index()
    {
        $borrowRequests = BorrowRequest::all();
        return ['borrowRequests' => $borrowRequests];
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'borrower_id' => 'required|exists:borrowers,id',
            'supervisor_id' => 'required|exists:supervisors,id',
            'asset_id' => 'required|exists:assets,id',
            'start_timestamp' => 'required|date',
            'end_timestamp' => 'required|date|after:start_timestamp',
            'borrowed_amount' => 'required|integer',
            'status' => 'required|string'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        $borrowRequest = BorrowRequest::create($validatedData);

        // Optionally, you can perform additional actions after creating the borrow request

        return redirect()->route('borrower.view_borrowing_requests', $borrowRequest->id)
            ->with('success', 'Borrow request created successfully');
    }

    public function update(Request $request, BorrowRequest $borrowRequest)
    {
        $validatedData = $this->validateData($request);

        $borrowRequest->update($validatedData);

        return back()->with('success', 'Borrow request updated successfully');
    }

    public function destroy(BorrowRequest $borrowRequest)
    {
        $borrowRequest->delete();

        return back()->with('success', 'Borrow request deleted successfully');
    }
}
