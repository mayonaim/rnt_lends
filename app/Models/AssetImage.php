<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetImage extends Model
{
    protected $fillable = [
        'asset_id', 'name',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

}
