<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BorrowRequest;
use Carbon\Carbon;

class UpdateBorrowingRequests extends Command
{
    protected $signature = 'borrow-requests:update';
    protected $description = 'Update borrowing requests status based on timestamps';

    public function handle()
    {
        $now = Carbon::now();

        // Find borrowing requests with status 'approved' or 'borrowing'
        $borrowRequests = BorrowRequest::whereIn('status', ['pending', 'approved', 'borrowing'])->get();

        foreach ($borrowRequests as $borrowRequest) {
            $startTimestamp = Carbon::parse($borrowRequest->start_timestamp);
            $endTimestamp = Carbon::parse($borrowRequest->end_timestamp);

            // Check if borrowing time has begun and status is 'approved'
            if ($now >= $startTimestamp && $borrowRequest->status === 'pending') {
                $borrowRequest->status = 'rejected';
                $borrowRequest->save();
            }

            // Check if borrowing time has begun and status is 'approved'
            if ($now >= $startTimestamp && $borrowRequest->status === 'approved') {
                $borrowRequest->status = 'borrowing';
                $borrowRequest->save();
            }

            // Check if borrowing time has ended and status is 'borrowing'
            if ($now >= $endTimestamp && $borrowRequest->status === 'borrowing') {
                $borrowRequest->status = 'completed';
                $borrowRequest->save();
            }
        }

        $this->info('Borrowing requests updated successfully.');
    }
}
