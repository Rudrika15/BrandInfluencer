<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;


    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaignId', 'id');
    }

    public function campaignData()
    {
        return $this->hasOne(Campaign::class, 'id', 'campaignId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
