<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\BrandCategory;
use App\Models\BrandWithCategory;
use App\Models\Brochure;
use App\Models\Campaign;
use App\Models\Cardportfoilo;
use App\Models\Cardservices;
use App\Models\CardsModels;
use App\Models\Categories;
use App\Models\Category;
use App\Models\CategoryInfluencer;
use App\Models\Feedback;
use App\Models\InfluencerPortfolio;
use App\Models\InfluencerProfile;
use App\Models\Inquiry;
use App\Models\Link;
use App\Models\Payment;
use App\Models\Qrcode;
use App\Models\Servicedetail;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $user = User::count();

        $influencer = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Influencer');
            }
        )->count();
        $brand = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Brand');
            }
        )->count();

        return view('admin.dashboard.index', compact('user', 'brand', 'influencer'));
    }

    public function edit(Request $req)
    {
        try {
            $authid = Auth::User()->id;
            $userurl = Auth::user()->mobileno;

            // user refer code generation start
            $referUserId = Auth::user()->id;
            $username = Auth::user()->username;
            $newStr = str_replace(' ', '', $username);
            $referCode = $newStr . $referUserId;
            $user = User::find($referUserId);
            $user->myrefer = $referCode;
            $user->save();
            // end


            $influencer = InfluencerProfile::where('userId', '=', $authid)->first();
            $brand_category = BrandWithCategory::where('brandId', '=', $authid)->get();
            $category = Categories::all();
            $influencerCategory = CategoryInfluencer::all();
            $brandCategory = BrandCategory::all();
            // $category = Admin::all();
            $data = User::where('id', '=', $authid)->get();
            $users = User::find($authid);

            $campaignWithApply = Campaign::whereHas('AppliedInfluencer')->with('AppliedInfluencer')->where('userId', $authid)->get();

            $portfolio = InfluencerPortfolio::where('userId', '=', $authid)->get();

            return view('user.profile.index', compact('authid', 'userurl', 'influencer', 'campaignWithApply', 'influencerCategory', 'brand_category', 'brandCategory',   'category',  'users', 'data', 'portfolio'));
            // }
        } catch (\Throwable $th) {
            throw $th;
            // 

        }
    }
    public function editProfile($id)
    {

        $influencer = InfluencerProfile::where('userId', '=', $id)->first();
        $category = Categories::all();
        $influencerCategory = CategoryInfluencer::all();
        $brandCategory = BrandCategory::all();
        $brand_category = BrandWithCategory::where('brandId', '=', $id)->get();
        // $category = Admin::all();
        // $data = User::where('id', '=', $id)->get();
        $users = User::find($id);


        return view('user.profile.edit', compact('influencer', 'influencerCategory', 'brand_category', 'brandCategory',   'category',  'users'));
    }

    /* card new store */
    public function store(Request $request)
    {

        try {
            // return $request;
            $id = Auth::user()->id;
            $userData = User::find($id);
            $userData->username = $request->username;
            $userData->state = $request->state;
            $userData->city = $request->city;
            $userData->about = $request->about;

            if ($request->hasFile('profilePhoto')) {

                $userData->profilePhoto = time() . '.' . $request->profilePhoto->extension();
                $request->profilePhoto->move(public_path('profile'), $userData->profilePhoto);
            }

            $userData->save();

            $roleCollection = $userData->getRoleNames();
            $roles = $roleCollection->toArray();
            if (in_array('Influencer', $roles)) {
                $influencer = InfluencerProfile::where('userId', '=', $id)->first();
                $influencer->city = $userData->city;
                $influencer->state = $userData->state;
                $influencer->gender = $request->gender;
                $influencer->dob = $request->dob;
                $influencer->instagramUrl = $request->instagramUrl;
                $influencer->instagramFollowers = $request->instagramFollowers;
                $influencer->youtubeChannelUrl = $request->youtubeChannelUrl;
                $influencer->youtubeSubscriber = $request->youtubeSubscriber;
                // $influencer->pinCode = $request->pinCode;
                $influencer->address = $request->address;
                $influencer->save();
            }

            // if (in_array('Brand', $roles)) {

            //     return "brand";
            // }


            return redirect()->back()->with('success', 'Details Updated successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function categoryUpdate(Request $request)
    {
        $id = $request->userId;
        $user = User::find($id);
        $roleCollection = $user->getRoleNames();
        $roles = $roleCollection->toArray();
        if (in_array('Influencer', $roles)) {
            $findInfluencer = InfluencerProfile::where('userId', '=', $id)->first();
            $findInfluencer->categoryId = $request['categories'];
            $findInfluencer->save();
        }
        if (in_array('Brand', $roles)) {

            $newCategories = $request->input('brandCategoryId', []);

            // Ensure the request 'category' is treated as an array
            if (is_string($newCategories)) {
                $newCategories = json_decode($newCategories, true);
            }

            // Remove all existing categories for the brand
            BrandWithCategory::where('brandId', '=', $id)->delete();

            // Add the new categories
            foreach ($newCategories as $categoryId) {
                $data = new BrandWithCategory();
                $data->brandId = $request->userId;
                $data->brandCategoryId = $categoryId;
                $data->save();
            }
        }



        return redirect()->back()->with('success', 'Details Updated successfully');
    }

    public function addPortfolio(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required',
        ]);
        try {
            $userId = Auth::user()->id;
            $portfolio = new InfluencerPortfolio();
            $portfolio->title = "-";
            $portfolio->userId = $userId;
            $portfolio->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('portfolioPhoto'), $portfolio->photo);
            $portfolio->type = "Image";
            $portfolio->details = "-";
            $portfolio->save();

            return redirect()->back()->with('success', 'Added Successfully..');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
