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
        return view('borrow_requests.index', compact('borrowRequests'));
    }

    public function create()
    {
        return view('borrow_requests.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'borrower_id' => 'required|exists:borrowers,id',
            'supervisor_id' => 'required|exists:supervisors,id',
            'asset_id' => 'required|exists:assets,id',
            'start_timestamp' => 'required|date',
            'end_timestamp' => 'required|date|after:start_timestamp',
            'borrowed_amount' => 'required|integer',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $borrowRequest = BorrowRequest::create($request->all());

        // Optionally, you can perform additional actions after creating the borrow request

        return redirect()->route('borrow_requests.show', $borrowRequest->id)
            ->with('success', 'Borrow request created successfully');
    }
    public function edit(BorrowRequest $borrowRequest)
    {
        return view('borrow_requests.edit', compact('borrowRequest'));
    }

    public function update(Request $request, BorrowRequest $borrowRequest)
    {
        $borrowRequest->update($request->all());
        return redirect()->route('borrow_requests.index')->with('success', 'Borrow request updated successfully');
    }

    public function destroy(BorrowRequest $borrowRequest)
    {
        $borrowRequest->delete();
        return redirect()->route('borrow_requests.index')->with('success', 'Borrow request deleted successfully');
    }
}
