<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_id', 'asset_id', 'name'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

}
