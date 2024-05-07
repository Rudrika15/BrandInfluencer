<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandOffer extends Model
{
    use HasFactory;

    function brand()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
