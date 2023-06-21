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

        // Retrieve all borrowing requests
        $borrowRequests = BorrowRequest::all();

        $rejectedIds = [];
        $borrowingIds = [];
        $finishedIds = [];

        foreach ($borrowRequests as $borrowRequest) {
            $startTimestamp = Carbon::parse($borrowRequest->start_timestamp);
            $endTimestamp = Carbon::parse($borrowRequest->end_timestamp);

            if (($now >= $startTimestamp && $borrowRequest->status === 'pending') || $borrowRequest->status === 'validated') {
                $rejectedIds[] = $borrowRequest->id;
            }

            if ($now >= $startTimestamp && $borrowRequest->status === 'approved') {
                $borrowingIds[] = $borrowRequest->id;
            }

            if ($now >= $endTimestamp && $borrowRequest->status === 'borrowing') {
                $finishedIds[] = $borrowRequest->id;
            }
        }

        if (!empty($rejectedIds)) {
            BorrowRequest::whereIn('id', $rejectedIds)->update(['status' => 'rejected']);
        }

        if (!empty($borrowingIds)) {
            BorrowRequest::whereIn('id', $borrowingIds)->update(['status' => 'borrowing']);
        }

        if (!empty($finishedIds)) {
            BorrowRequest::whereIn('id', $finishedIds)->update(['status' => 'finished']);
        }

        $this->info('Borrowing requests updated successfully.');
    }
}
