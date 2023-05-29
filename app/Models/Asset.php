<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'name', 'description', 'category', 'stock', 'pic_id'
    ];

    public function pic()
    {
        return $this->belongsTo(PIC::class, 'pic_id');
    }
}
