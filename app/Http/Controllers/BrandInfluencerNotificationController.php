<?php

namespace App\Http\Controllers;

use App\Models\BrandInfluencerNotification;
use Illuminate\Http\Request;

class BrandInfluencerNotificationController extends Controller
{
    public function index()
    {
        $notifications = BrandInfluencerNotification::orderBy('created_at', 'desc')->get();
        return view('influencer.notifications.index', compact('notifications'));
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
