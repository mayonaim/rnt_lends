<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $guarded = [];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function requestedAssets()
    {
        return $this->hasMany(RequestedAsset::class);
    }
}
