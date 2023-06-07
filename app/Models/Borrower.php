<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'user_id', 'name', 'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function borrowRequests()
    {
        return $this->hasMany(BorrowRequest::class, 'borrower_id');
    }
}
