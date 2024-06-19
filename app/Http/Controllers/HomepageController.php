<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Cardportfoilo;
use App\Models\CategoryInfluencer;
use App\Models\InfluencerProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    //

    function index(Request $request)
    {


        $roles = Auth::user()->roles->pluck('name');

        // influencer

        // $applied = Apply::where('userId', Auth::user()->id)->get();
        // foreach ($applied as $apply) {
        // }
        $brands = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Brand');
            }
        )->whereHas('brand')->with('brand')
            // ->where('id', '!=', $apply)
            ->get();



        // brand 
        $category = CategoryInfluencer::all();

        $influencer = User::whereHas('roles', function ($q) {
            $q->where('name', 'Influencer');
        })->with('card')->whereHas('influencer');

        $categoryName = $request->category;
        // return dd($categoryName);
        if ($categoryName) {
            $influencer = User::whereHas('roles', function ($q) {
                $q->where('name', 'Influencer');
            })->with('card')->whereHas('influencer', function ($q) use ($categoryName) {
                $q->whereJsonContains('categoryId', $categoryName);
            });
        }


        $influencer = $influencer->get();

        if ($roles->contains('Brand')) {
            session(['role' => 'brand']);
        }
        if ($roles->contains('Influencer')) {
            session(['role' => 'influencer']);
        }

        return view('home', compact('brands', 'influencer', 'category'));
    }

    public function updateSession(Request $request)
    {
        // Get the role from the request
        $role = $request->input('role');

        // Update the session with the selected role
        session(['role' => $role]);

        return response()->json(['message' => 'Session updated successfully']);
    }

    function about()
    {
        return view('extra.otherpages.about');
    }
    function contact()
    {
        return view('extra.otherpages.contact');
    }
    function privacy()
    {
        return view('extra.otherpages.privacy');
    }
    function refund()
    {
        return view('extra.otherpages.refund');
    }
    function term()
    {
        return view('extra.otherpages.terms');
    }


    public function influencer(Request $request)
    {
        try {
            $influencers = User::whereHas('roles', function ($q) {
                $q->where('name', 'Influencer');
            })->whereHas('influencer')->get();
            $category = CategoryInfluencer::all();
            // $categoryNames = $request->category;
            $categoryNames = $request->category;
            if ($categoryNames) {
                // return "hii" . $categoryNames;
                $influencers = User::whereHas('roles', function ($q) {
                    $q->where('name', 'Influencer');
                })->whereHas('influencer', function ($q) use ($categoryNames) {
                    $q->whereJsonContains('categoryId', $categoryNames);
                })->get();
                // return "filtered" . $influencers;
            } else {

                $influencers = User::whereHas('roles', function ($q) {
                    $q->where('name', 'Influencer');
                })->with('influencer')->get();
                // return "none filtered";
            }
            return view('extra.influencer', \compact('influencers', 'category'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function influencerProfileView($id)
    {
        try {
            $profile = InfluencerProfile::with('profile')
                ->with('incategory')
                ->where('userId', '=', $id)
                ->orderBy('id', 'DESC')
                ->first();
            $influencer = User::where('id', '=', $id)->with('influencerPackage')->with('card')->first();
            return view('extra.influencerProfile', \compact('profile', 'influencer'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
