<?php

namespace App\Http\Controllers;

use App\Models\BrandInfluencerNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandInfluencerNotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name');
        $userId = $user->id;

        if ($roles->contains('Influencer')) {
            $visible = 'I';
        } elseif ($roles->contains('Brand')) {
            $visible = 'B';
        } else {
            abort(403, 'Unauthorized');
        }

        // ✅ All Notifications
        $notificationsAll = BrandInfluencerNotification::orderBy('created_at', 'desc')
            ->where(function ($q) use ($visible, $userId) {
                $q->where('visible', $visible)
                    ->where('userId', $userId);
            })
            ->paginate(10);

        // ✅ Mark all as unread (if required)
        foreach ($notificationsAll as $notification) {
            $notification->is_read = 'No';
            $notification->save();
        }

        // ✅ General Notifications
        $notificationsGeneral = BrandInfluencerNotification::orderBy('created_at', 'desc')
            ->where('type', 'General')
            ->where(function ($q) use ($visible, $userId) {
                $q->where('visible', $visible)
                    ->where('userId', $userId);
            })
            ->paginate(10);

        // ✅ Campaign Notifications
        $notificationsCampaign = BrandInfluencerNotification::orderBy('created_at', 'desc')
            ->where('type', 'Campaign')
            ->where(function ($q) use ($visible, $userId) {
                $q->where('visible', $visible)
                    ->where('userId', $userId);
            })
            ->paginate(10);

        return view('influencer.notifications.index', compact(
            'notificationsAll',
            'notificationsGeneral',
            'notificationsCampaign'
        ));
    }




    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BrandInfluencerNotification  $brandInfluencerNotification
     * @return \Illuminate\Http\Response
     */
    public function show(BrandInfluencerNotification $brandInfluencerNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrandInfluencerNotification  $brandInfluencerNotification
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandInfluencerNotification $brandInfluencerNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BrandInfluencerNotification  $brandInfluencerNotification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandInfluencerNotification $brandInfluencerNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BrandInfluencerNotification  $brandInfluencerNotification
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandInfluencerNotification $brandInfluencerNotification)
    {
        //
    }
}
