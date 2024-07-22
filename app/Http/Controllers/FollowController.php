<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $follows = Follow::where('followingId',  $userId)
            ->where('status',  'requested')->paginate(5);
        $friends = Follow::where('followingId', $userId)->where('status', 'following')->paginate(5);
        //  $friends = Follow::all();
        return \view('user.follow.index', \compact('follows', 'friends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $following = Follow::find($id);
        $following->status = 'following';
        $following->save();
        return \redirect()->route('requests')->with('success', 'Approved');
    }

    public function reject($id)
    {
        $following = Follow::find($id);
        $following->status = 'rejected';
        $following->save();
        return \redirect()->route('requests')->with('error', 'Rejected');
    }

    public function remove($id)
    {
        $following = Follow::find($id);
        $following->delete();
        if ($following->status == 'following')
            return \redirect()->route('requests')->with('error', 'Removed From Followers');
        else
            return \redirect()->route('requests')->with('error', 'Rejected');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $following = new Follow();
        $following->userId = Auth::user()->id;
        $following->followingId = $request->followingId;
        $following->status = 'requested';
        $following->save();
        return \redirect()->back()->with('success', 'Request sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
