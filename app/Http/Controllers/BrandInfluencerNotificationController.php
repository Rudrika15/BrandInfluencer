<?php

namespace App\Http\Controllers;

use App\Models\BrandInfluencerNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandInfluencerNotificationController extends Controller
{
    public function index()
    {

        $roles = Auth::user()->roles->pluck('name');

        if ($roles->contains('Influencer')) {

            $notificationsAll = BrandInfluencerNotification::orderBy('created_at', 'desc')
                ->where('visible', 'I')
                ->orWhere('userId', Auth::user()->id)
                ->get();


            foreach ($notificationsAll as $notification) {
                if ($notification->type == 'General') {

                    $notification->is_read = 'No';
                    $notification->save();
                }
            }

            $notificationsGeneral = BrandInfluencerNotification::orderBy('created_at', 'desc')
                ->where('type', 'General')
                ->where('visible', 'I')
                ->where('userId', Auth::user()->id)
                ->get();
            $notificationsCampaign = BrandInfluencerNotification::orderBy('created_at', 'desc')
                ->where('type', 'Campaign')
                ->where('visible', 'I')
                // ->orWhere('userId', Auth::user()->id)
                ->get();


            foreach ($notificationsCampaign as $notificationc) {

                $notificationc->is_read = 'No';
                $notificationc->save();
            }
        }

        if ($roles->contains('Brand')) {
            $notificationsAll = BrandInfluencerNotification::orderBy('created_at', 'desc')
                ->where('visible', 'B')
                ->orWhere('userId', Auth::user()->id)
                ->get();

            $notificationsGeneral = BrandInfluencerNotification::orderBy('created_at', 'desc')
                ->where('type', 'General')
                ->where('visible', 'B')
                ->where('userId', Auth::user()->id)
                ->get();
            $notificationsCampaign = BrandInfluencerNotification::orderBy('created_at', 'desc')
                ->where('type', 'Campaign')
                ->where('visible', 'B')
                ->orWhere('userId', Auth::user()->id)
                ->get();
        }

        return view('influencer.notifications.index', compact('notificationsAll', 'notificationsGeneral', 'notificationsCampaign'));
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
