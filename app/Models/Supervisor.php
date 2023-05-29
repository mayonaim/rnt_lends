<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;
    protected $fillable = [
        'supervisor_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
