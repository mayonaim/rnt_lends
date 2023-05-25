<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    // Relationships
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
