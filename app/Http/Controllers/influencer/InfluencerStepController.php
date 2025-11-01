<?php

namespace App\Http\Controllers\influencer;


use App\Http\Controllers\Controller;
use App\Models\CampaignInfluencerActivity;
use App\Models\CampaignInfluencerActivityStep;
use App\Models\CampaignStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfluencerStepController extends Controller
{
    public function index($campaignId)
    {
        $campaignStep = CampaignStep::where('campaignId', '=', $campaignId)
            ->orderBy('id', 'DESC')
            ->get();

        $influencerId = Auth::user()->id;
        $content = CampaignInfluencerActivityStep::where('influencerId', '=', $influencerId)
            ->get();
        // return $counter;
        return view('influencer.campaignView.viewStep', \compact('campaignStep', 'content'));
    }

    public function create()
    {
        //
    }

    // public function store(Request $request)
    // {
    //     // upload step
    //     $campaignId = $request->campaignId;
    //     $influencerId = Auth::user()->id;
    //     $stepId = $request->stepId;

    //     $activity = new CampaignInfluencerActivity();
    //     $activity->campaignId = $campaignId;
    //     $activity->influencerId = $influencerId;
    //     $activity->save();

    //     $activityStep = new CampaignInfluencerActivityStep();
    //     $activityStep->campaignInfluencerActivityId = $activity->id;
    //     $activityStep->campaignId = $campaignId;
    //     $activityStep->influencerId = $influencerId;
    //     $activityStep->stepId = $stepId;
    //     if ($request->uploadActivityPhoto) {
    //         $activityStep->uploadActivityPhoto = time() . '.' . $request->uploadActivityPhoto->extension();
    //         $request->uploadActivityPhoto->move(public_path('uploadActivityPhoto'), $activityStep->uploadActivityPhoto);
    //     }

    //     $activityStep->uploadActivityLink = $request->uploadActivityLink;
    //     $activityStep->save();
    //     return redirect()->back()->with('success', 'Upload Successfully');
    // }
    // public function store(Request $request)
    // {
    //     $campaignId = $request->campaignId;
    //     $influencerId = Auth::user()->id;
    //     $stepId = $request->stepId;

    //     $activity = new CampaignInfluencerActivity();
    //     $activity->campaignId = $campaignId;
    //     $activity->influencerId = $influencerId;
    //     $activity->save();

    //     $activityStep = new CampaignInfluencerActivityStep();
    //     $activityStep->campaignInfluencerActivityId = $activity->id;
    //     $activityStep->campaignId = $campaignId;
    //     $activityStep->influencerId = $influencerId;
    //     $activityStep->stepId = $stepId;

    //     // ✅ Upload photo
    //     if ($request->hasFile('uploadActivityPhoto')) {
    //         $photoName = time() . '.' . $request->uploadActivityPhoto->extension();
    //         $request->uploadActivityPhoto->move(public_path('uploadActivityPhoto'), $photoName);
    //         $activityStep->uploadActivityPhoto = 'uploadActivityPhoto/' . $photoName;
    //     }

    //     // ✅ Upload video (field name unchanged)
    //     if ($request->hasFile('uploadActivityLink')) {
    //         $videoFile = $request->file('uploadActivityLink');
    //         $videoName = time() . '_' . uniqid() . '.' . $videoFile->getClientOriginalExtension();
    //         $videoFile->move(public_path('uploadActivityVideo'), $videoName);
    //         $activityStep->uploadActivityLink = 'uploadActivityVideo/' . $videoName;
    //     }

    //     $activityStep->save();

    //     return redirect()->back()->with('success', 'Upload Successfully');
    // }
    public function store(Request $request)
    {
        // 🔒 Step 1: Validate all inputs
        $request->validate([
            
            'uploadActivityPhoto' => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'uploadActivityLink'  => 'nullable|file|mimetypes:video/mp4', 
        ], [
            // 🗨️ Custom error messages
            'campaignId.required' => 'Campaign ID is required.',
            'campaignId.exists'   => 'Invalid campaign selected.',
            'stepId.required'     => 'Step ID is required.',
            'uploadActivityPhoto.mimes' => 'Only JPG, PNG, or WEBP images are allowed.',
            'uploadActivityPhoto.max'   => 'Photo size must not exceed 2 MB.',
            'uploadActivityLink.mimetypes' => 'Only MP4 video files are allowed.',
            'uploadActivityLink.max'       => 'Video size must not exceed 20 MB.',
        ]);

        // 🧩 Step 2: Prepare variables
        $campaignId = $request->campaignId;
        $influencerId = Auth::id();
        $stepId = $request->stepId;

        // 🧩 Step 3: Create Campaign Activity
        $activity = new CampaignInfluencerActivity();
        $activity->campaignId = $campaignId;
        $activity->influencerId = $influencerId;
        $activity->save();

        // 🧩 Step 4: Create Activity Step
        $activityStep = new CampaignInfluencerActivityStep();
        $activityStep->campaignInfluencerActivityId = $activity->id;
        $activityStep->campaignId = $campaignId;
        $activityStep->influencerId = $influencerId;
        $activityStep->stepId = $stepId;

        // ✅ Step 5: Upload Photo (optional)
        if ($request->hasFile('uploadActivityPhoto')) {
            $photoFile = $request->file('uploadActivityPhoto');
            $photoName = time() . '_' . uniqid() . '.' . $photoFile->getClientOriginalExtension();
            $photoFile->move(public_path('uploadActivityPhoto'), $photoName);
            $activityStep->uploadActivityPhoto = 'uploadActivityPhoto/' . $photoName;
        }

        // ✅ Step 6: Upload Video (optional)
        if ($request->hasFile('uploadActivityLink')) {
            $videoFile = $request->file('uploadActivityLink');
            $videoName = time() . '_' . uniqid() . '.' . $videoFile->getClientOriginalExtension();
            $videoFile->move(public_path('uploadActivityVideo'), $videoName);
            $activityStep->uploadActivityLink = 'uploadActivityVideo/' . $videoName;
        }

        // 💾 Step 7: Save record
        $activityStep->save();

        // ✅ Step 8: Redirect success
        return redirect()->back()->with('success', 'Upload Successfully');
    }
}
