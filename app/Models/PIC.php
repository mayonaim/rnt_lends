<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PIC extends Model
{
    protected $table = 'people_in_charge';

    protected $fillable = [
        'user_id', 'name', 'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'pic_id');
    }
}
