<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $table = 'applies';

    protected $fillable = [
        'campaignId',
        'userId',
        'status',
    ];

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

    // ✅ Fetch all uploaded photos/videos related to this applier
    // public function activitySteps()
    // {
    //     return $this->hasMany(
    //         CampaignInfluencerActivityStep::class,
    //         'influencerId', // foreign key on steps table
    //         'userId'        // local key in applies table
    //     )->whereColumn('campaign_influencer_activity_steps.campaignId', 'applies.campaignId');
    // }

//     public function activitySteps()
// {
//     return $this->hasMany(CampaignInfluencerActivityStep::class, 'userId', 'userId')
//                 ->whereColumn('campaignId', 'applies.campaignId');
// }
    public function activityStep()
    {
        return $this->hasOne(CampaignInfluencerActivityStep::class, 'influencerId', 'userId')
            ->whereColumn('campaign_influencer_activity_steps.campaignId', 'appliers.campaignId');
    }
}
