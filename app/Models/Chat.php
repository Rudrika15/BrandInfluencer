<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;


    public function chatGroup()
    {
        return $this->belongsTo(ChatGroup::class, 'groupId', 'id');
    }
}
