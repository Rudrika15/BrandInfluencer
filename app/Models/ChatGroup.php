<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatGroup extends Model
{
    use HasFactory;


    public function chat()
    {
        return $this->hasMany(Chat::class, 'groupId', 'id');
    }

    public function influencer()
    {
        return $this->belongsTo(User::class, 'influencerId', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(User::class, 'brandId', 'id');
    }
}
