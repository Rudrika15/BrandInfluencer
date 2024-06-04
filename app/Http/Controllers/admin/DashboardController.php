<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BrandCategory;
use App\Models\BrandWithCategory;
use App\Models\Brochure;
use App\Models\Cardportfoilo;
use App\Models\Cardservices;
use App\Models\CardsModels;
use App\Models\Categories;
use App\Models\Category;
use App\Models\CategoryInfluencer;
use App\Models\Feedback;
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
    // public function edit(Request $req)
    // {
    //     try {
    //         $authid = Auth::User()->id;
    //         $userurl = Auth::user()->mobileno;

    //         // user refer code generation start
    //         $referUserId = Auth::user()->id;
    //         $username = Auth::user()->username;
    //         $newStr = str_replace(' ', '', $username);
    //         $referCode = $newStr . $referUserId;
    //         $user = User::find($referUserId);
    //         $user->myrefer = $referCode;
    //         $user->save();
    //         // end

    //         // $details = CardsModels::where('user_id', '=', $authid)->first();
    //         // $id = $details->id;
    //         // #for service details
    //         // $servicedetail = Servicedetail::where('card_id', '=', $id)->get();
    //         // #for payment data
    //         // $payment = Payment::where('card_id', '=', $id)->first();

    //         // $data1 = Cardservices::join('cards', 'cards.id', '=', 'cardservices.card_id')->where('cards.user_id', '=', $authid)
    //         //     ->where('cardservices.card_id', '=', $id)
    //         //     ->get(['cardservices.*']);

    //         $influencer = InfluencerProfile::where('userId', '=', $authid)->first();
    //         $brand_category = BrandWithCategory::where('brandId', '=', $authid)->first();
    //         $category = Categories::all();
    //         $influencerCategory = CategoryInfluencer::all();
    //         $brandCategory = BrandCategory::all();
    //         // $category = Admin::all();
    //         $data = User::where('id', '=', $authid)->get();
    //         // $link = Link::join('cards', 'cards.id', '=', 'cardlinkes.card_id')
    //         //     ->where('cards.user_id', '=', $authid)
    //         //     ->where('cardlinkes.card_id', '=', $id)
    //         //     ->get(['cardlinkes.*']);

    //         // $links = Link::where('card_id', '=', $id)->first();
    //         // $qr = Qrcode::where('card_id', '=', $id)->get();
    //         $users = User::find($authid);


    //         // $feed = Feedback::where('card_id', '=', $id)->get();
    //         // $inq = Inquiry::where('card_id', '=', $id)->get();

    //         // $admincategory = Category::all();
    //         // $cardimage = Cardportfoilo::where('cardportfoilos.card_id', '=', $id)
    //         //     ->where('type', '=', 'Photo')
    //         //     // ->orWhere('type', '=', 'Image')
    //         //     ->get('cardportfoilos.*');
    //         // $cardvideo = Cardportfoilo::where('cardportfoilos.card_id', '=', $id)
    //         //     ->where('type', '=', 'Video')
    //         //     ->get('cardportfoilos.*');


    //         // $bro = Brochure::where('card_id', '=', $id)->get();
    //         // $slider = Slider::where('card_id', '=', $id)->get();

    //         // $linkcount = Link::where('card_id', '=', $id)->count();

    //         // $category = Category::all();
    //         // if ($linkcount > 0) {
    //         //     return view('demo', compact('linkcount', 'inq', 'cardvideo', 'feed', 'id', 'details', 'qr', 'links', 'data1', 'category', 'cardimage', 'servicedetail', 'payment', 'admincategory', 'users'));
    //         // } else {
    //         // return view('user.profile.index', compact('authid', 'userurl', 'influencer', 'influencerCategory', 'brand_category', 'brandCategory', 'category', 'slider', 'bro', 'linkcount', 'inq', 'cardvideo', 'feed', 'id', 'details', 'qr', 'links', 'data1', 'category', 'cardimage', 'servicedetail', 'payment', 'admincategory', 'users'));
    //         return view('user.profile.index', compact('authid', 'userurl', 'influencer', 'influencerCategory', 'brand_category', 'brandCategory',   'category',  'users', 'data'));
    //         // }
    //     } catch (\Throwable $th) {
    //         throw $th;
    //         // 

    //     }
    // }
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
            $brand_category = BrandWithCategory::where('brandId', '=', $authid)->first();
            $category = Categories::all();
            $influencerCategory = CategoryInfluencer::all();
            $brandCategory = BrandCategory::all();
            // $category = Admin::all();
            $data = User::where('id', '=', $authid)->get();
            $users = User::find($authid);


            return view('user.profile.index', compact('authid', 'userurl', 'influencer', 'influencerCategory', 'brand_category', 'brandCategory',   'category',  'users', 'data'));
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
}
