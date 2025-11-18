<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignInfluencerActivityStep extends Model
{
    use HasFactory;

    protected $table = 'campaign_influencer_activity_steps';

    protected $fillable = [
        'campaignInfluencerActivityId',
        'campaignId',
        'influencerId',
        'stepId',
        'status',
        'uploadActivityPhoto',
        'uploadActivityLink',
        'brandApproved',
        'remark'
    ];

    // Relation to Campaign
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaignId', 'id');
    }

    // Relation to Influencer (User)
    public function influencer()
    {
        return $this->belongsTo(User::class, 'influencerId', 'id');
    }

    // Relation to Apply table
    public function apply()
    {
        return $this->belongsTo(Apply::class, 'influencerId', 'userId')
            ->whereColumn('campaign_influencer_activity_steps.campaignId', 'applies.campaignId');
    }
}
