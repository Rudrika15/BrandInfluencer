<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\branddetails;
use App\Models\Campaign;
use App\Models\Cardportfoilo;
use App\Models\CategoryInfluencer;
use App\Models\InfluencerProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    //

    function index(Request $request)
    {


        $roles = Auth::user()->roles->pluck('name');

        // influencer

        // return $applied = Apply::where('userId', Auth::user()->id)->get(["campaignId"])->toArray();
        $applied = Apply::where('userId', Auth::user()->id)->get();

        // foreach ($applied as $apply) {
        // }

        // $brands = User::whereHas(
        //     'roles',
        //     function ($q) {
        //         $q->where('name', 'Brand');
        //     }
        // )->whereHas('campaign',)->with('campaign')
        //     ->whereNotIn('id', $applied)
        //     ->get();

        $appliedIds = Arr::pluck($applied, 'campaignId');

        $campaigns = Campaign::whereNotIn('id', $appliedIds)
            ->where('startDate', '<=', now())
            ->where('endDate', '>=', now())
            ->orderBy('created_at', 'desc')
            ->get();

        // brand 
        $category = CategoryInfluencer::all();

        $categoryId = $request->input('category');
        $type = $request->input('type');

        // Initialize the query to get users with the 'Influencer' role
        $influencer = User::whereHas('roles', function ($q) {
            $q->where('name', 'Influencer');
        })->with('influencer')->whereHas('influencer');

        // Apply category filter if specified
        if (!empty($categoryId)) {
            $influencer->whereHas('influencer', function ($q) use ($categoryId) {
                $q->where(function ($q) use ($categoryId) {
                    foreach ($categoryId as $category) {
                        $q->orWhereJsonContains('categoryId', $category);
                    }
                });
            });
        }

        // Apply type filters
        if ($type == "is_trending") {
            $influencer->whereHas('influencer', function ($q) {
                $q->where('is_trending', 'on');
            });
        } elseif ($type == "is_featured") {
            $influencer->whereHas('influencer', function ($q) {
                $q->where('is_featured', 'on');
            });
        } elseif ($type == "is_brandBeansVerified") {
            $influencer->whereHas('influencer', function ($q) {
                $q->where('is_brandBeansVerified', 'on');
            });
        }

        // $influencer->whereHas('influencer', function ($q) {
        //     $q->where('is_trending', 'on');
        // });

        // Get the results
        $influencer = $influencer->get();


        if ($roles->contains('Brand')) {
            session(['role' => 'brand']);
        }
        if ($roles->contains('Influencer')) {
            session(['role' => 'influencer']);
        }

        return view('home', compact('campaigns', 'influencer', 'category'));
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

    public function brandDetails(Request $request)
    {
        $request->validate([
            'brandname' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'message' => 'required',
        ]);
        $brandDetails = new branddetails();
        $brandDetails->brandname = $request->brandname;
        $brandDetails->name = $request->name;
        $brandDetails->email = $request->email;
        $brandDetails->mobile = $request->mobile;
        $brandDetails->message = $request->message;
        $brandDetails->save();
        return back()->with('success', 'Your Data Recorded Successfully , we will connect to you soon ');
    }


    public function search(Request $request)
    {
        $searchTerm = "%" . $request->search . "%";
        $applied = Apply::where('userId', Auth::user()->id)->get();
        $appliedIds = Arr::pluck($applied, 'campaignId');
        $campaigns = DB::table('campaigns')->where('title', 'LIKE', $searchTerm)
            ->whereNotIn('id', $appliedIds)
            ->where('startDate', '<=', now())
            ->where('endDate', '>=', now())
            ->orderBy('created_at', 'desc')->get();
        return response()->json($campaigns);
    }
}
