<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use Illuminate\Http\Request;

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
        $borrowRequest = BorrowRequest::create($request->all());
        return redirect()->route('borrow_requests.index')->with('success', 'Borrow request created successfully');
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
