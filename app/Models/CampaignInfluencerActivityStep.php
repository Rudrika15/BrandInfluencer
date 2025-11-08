<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignInfluencerActivityStep extends Model
{
    use HasFactory;

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaignId');
    }

    public function influencer()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}

