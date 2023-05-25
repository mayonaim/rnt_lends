<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestedAsset extends Model
{
    protected $guarded = [];

    // Relationships
    public function borrowRequest()
    {
        return $this->belongsTo(BorrowRequest::class);
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
