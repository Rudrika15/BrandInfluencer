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
        $reseller = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Reseller');
            }
        )->count();
        $writer = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Writer');
            }
        )->count();
        $designer = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Designer');
            }
        )->count();
        return view('admin.dashboard.index', compact('user', 'designer', 'writer', 'reseller', 'brand', 'influencer'));
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

            $details = CardsModels::where('user_id', '=', $authid)->first();
            $id = $details->id;
            #for service details
            $servicedetail = Servicedetail::where('card_id', '=', $id)->get();
            #for payment data
            $payment = Payment::where('card_id', '=', $id)->first();

            $data1 = Cardservices::join('cards', 'cards.id', '=', 'cardservices.card_id')->where('cards.user_id', '=', $authid)
                ->where('cardservices.card_id', '=', $id)
                ->get(['cardservices.*']);

            $influencer = InfluencerProfile::where('userId', '=', $authid)->first();
            $brand_category = BrandWithCategory::where('brandId', '=', $authid)->first();
            $category = Categories::all();
            $influencerCategory = CategoryInfluencer::all();
            $brandCategory = BrandCategory::all();
            // $category = Admin::all();
            $data = User::where('id', '=', $authid)->get();
            $link = Link::join('cards', 'cards.id', '=', 'cardlinkes.card_id')
                ->where('cards.user_id', '=', $authid)
                ->where('cardlinkes.card_id', '=', $id)
                ->get(['cardlinkes.*']);

            $links = Link::where('card_id', '=', $id)->first();
            $qr = Qrcode::where('card_id', '=', $id)->get();
            $users = User::find($authid);


            $feed = Feedback::where('card_id', '=', $id)->get();
            $inq = Inquiry::where('card_id', '=', $id)->get();

            $admincategory = Category::all();
            $cardimage = Cardportfoilo::where('cardportfoilos.card_id', '=', $id)
                ->where('type', '=', 'Photo')
                // ->orWhere('type', '=', 'Image')
                ->get('cardportfoilos.*');
            $cardvideo = Cardportfoilo::where('cardportfoilos.card_id', '=', $id)
                ->where('type', '=', 'Video')
                ->get('cardportfoilos.*');


            $bro = Brochure::where('card_id', '=', $id)->get();
            $slider = Slider::where('card_id', '=', $id)->get();

            $linkcount = Link::where('card_id', '=', $id)->count();

            $category = Category::all();
            // if ($linkcount > 0) {
            //     return view('demo', compact('linkcount', 'inq', 'cardvideo', 'feed', 'id', 'details', 'qr', 'links', 'data1', 'category', 'cardimage', 'servicedetail', 'payment', 'admincategory', 'users'));
            // } else {
            return view('user.profile.index', compact('authid', 'userurl', 'influencer', 'influencerCategory', 'brand_category', 'brandCategory', 'category', 'slider', 'bro', 'linkcount', 'inq', 'cardvideo', 'feed', 'id', 'details', 'qr', 'links', 'data1', 'category', 'cardimage', 'servicedetail', 'payment', 'admincategory', 'users'));
            // }
        } catch (\Throwable $th) {
            throw $th;
            // 

        }
    }

    /* card new store */
    public function store(Request $request)
    {
        $this->validate($request, [
            'year' => 'regex:/^[a-zA-Z0-9\s]+$/',
            'logo' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml',
            'profilePhoto' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml',
            'category' => 'required',


        ], [
            'year.regex' => 'The year field must contain only letters and characters.',
            'logo.max' => 'The logo may not be greater than 2 MB.',
            'profilePhoto.max' => 'The profile photo may not be greater than 2 MB.',
            'logo.mimetypes' => 'The logo must be a valid image (jpeg, png, jpg, gif, svg).',
            'profilePhoto.mimetypes' => 'The profile photo must be a valid image (jpeg, png, jpg, gif, svg).',
        ]);
        try {
            $id = Auth::user()->id;
            //dd($id);
            $cards = CardsModels::where('user_id', '=', $id)->get();
            // return $cards;
            $card_id = $cards[0]->id;
            // return $card_id;
            $details =  CardsModels::find($card_id);


            // return $details;

            $details->name = $request->name;
            $details->heading = $request->heading;
            $details->companyname = $request->companyname;
            $details->city = $request->city;
            $details->state = $request->state;
            $category1 = $request->category;
            if ($category1 == 'other') {
                $categorystore = new Category();

                $categorystore->name = $request->categoryname;
                $categorystore->iconPath = "default.jpg";
                $categorystore->isBusiness = "yes";
                $categorystore->save();

                $details->category = $categorystore->id;
            } else {
                $details->category = $category1;
            }
            $details->about = $request->about;
            $details->address = $request->address;
            $details->year = $request->year;
            if ($request->logo) {
                $image = $request->logo;
                $details->logo = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('cardlogo'), $details->logo);
            }
            $details->save();

            $user = User::find($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $image = $request->profilePhoto;
            if ($request->profilePhoto) {
                // Get the original file name
                $originalFileName = time() . '.' . $request->profilePhoto->extension();

                // Optimize the image in place
                $optimizerChain = OptimizerChainFactory::create();
                $optimizerChain->optimize($request->file('profilePhoto')->getPathname());

                // Move the optimized image to the desired directory
                $request->profilePhoto->move(public_path('profile'), $originalFileName);

                // Save the optimized image filename to the user's profilePhoto attribute
                $user->profilePhoto = $originalFileName;
            }
            $user->save();


            if (Auth::user()->hasRole('Influencer')) {
                $influencerCategory = $request->categoryId;
                // $categoryData = implode(",", $influencerCategory);
                $this->validate($request, [
                    'pinCode' => 'numeric|digits:6',
                    'instagramUrl' => 'regex:/^(?!.*[@#])(?!.*https:\/\/instagram)/',
                ], [
                    'instagramUrl.regex' => 'Do not enter @,# or https://instagram in the url.',
                ]);
                $influencer = InfluencerProfile::where('userId', '=', $id)->first();
                if ($influencerCategory) {
                    $influencer->categoryId = $influencerCategory;
                }

                $influencer->address = $request->influaddress;
                $influencer->contactNo = $user->mobileno;
                $influencer->publicLocation = $request->publicLocation;
                $influencer->city = $details->city;
                $influencer->state = $details->state;
                $influencer->gender = $request->gender;
                $influencer->pinCode = $request->pinCode;
                $influencer->instagramUrl = $request->instagramUrl;
                $influencer->instagramFollowers = $request->instagramFollowers;
                $influencer->youtubeChannelUrl = $request->youtubeChannelUrl;
                $influencer->youtubeSubscriber = $request->youtubeSubscriber;
                $influencer->dob = $request->dob;
                $influencer->save();
            }

            if (Auth::user()->hasRole('Brand')) {
                $brandId = Auth::user()->id;
                $brandCategory = BrandWithCategory::where('brandId', '=', $brandId)->first();
                if ($brandCategory) {
                    $brandCategory = BrandWithCategory::find($brandCategory->id);
                    $brandCategory->brandId = $brandId;
                    $brandCategory->brandCategoryId = $request->brandCategoryId;
                    $brandCategory->save();
                } else {
                    $brandCategory = new BrandWithCategory();
                    $brandCategory->brandId = $brandId;
                    $brandCategory->brandCategoryId = $request->brandCategoryId;
                    $brandCategory->save();
                }
            }
            return redirect()->back()->with('success', 'Details Updated successfully');
        } catch (\Throwable $th) {
            throw $th;
            // 
        }
    }
}
