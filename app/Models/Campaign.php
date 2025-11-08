<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    function AppliedInfluencer()
    {
        return $this->hasMany(Apply::class, 'campaignId', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }


    public function steps()
    {
        return $this->hasMany(CampaignStep::class, 'campaignId', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
