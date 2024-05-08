<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;


    public function sender()
    {
        return $this->belongsTo(User::class, 'senderId', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiverId', 'id');
    }
}
