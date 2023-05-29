<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PIC extends Model
{
    use HasFactory;

    protected $table = 'people_in_charge';

    protected $primaryKey = 'pic_id';

    protected $fillable = [
        'pic_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function asset()
    {
        return $this->hasMany(Asset::class, 'pic_id');
    }
}
