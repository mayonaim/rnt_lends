<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $fillable = [
        'user_id', 'name', 'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function borrowRequests()
    {
        return $this->hasMany(BorrowRequest::class, 'supervisor_id');
    }
}
