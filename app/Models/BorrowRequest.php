<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowRequest extends Model
{
    protected $fillable = [
        'borrower_id', 'asset_id', 'supervisor_id', 'activity', 'start_timestamp', 'end_timestamp',
        'borrowed_amount',  'status'
    ];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'borrower_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
