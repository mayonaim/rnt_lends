<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\BorrowRequest;

class SupervisorController extends Controller
{
    private $supervisorId;

    public function initialize()
    {
        $this->supervisorId = Auth::user()->supervisor->id;
    }

    public function home()
    {
        return view('penanggungJawab.home');
    }


    public function borrowRequests()
    {
        $this->initialize();
        $supervisorId = $this->supervisorId;
        $borrowRequestsAll = BorrowRequest::with(['supervisor', 'supervisor', 'asset']);
        $userBorrowRequests = $borrowRequestsAll->where('supervisor_id', $supervisorId);

        return view('penanggungJawab.borrowing-requests', compact('userBorrowRequests', 'supervisorId'));
    }

}
