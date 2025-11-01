<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\admin\BrandCategoryController;
use App\Http\Controllers\Controller;
use App\Models\BrandWithCategory;
use App\Models\Brochure;
use App\Models\Cardportfoilo;
use App\Models\BrandCategory;
use App\Models\CardsModels;
use App\Models\Category;
use App\Models\InfluencerProfile;
use App\Models\Link;
use App\Models\Payment;
use App\Models\Point;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Assign;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     $validation = Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'username' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'mobileno' => ['required', 'unique:users'],
    //         'password' => ['required', 'confirmed'],
    //         'brandCategory' => 'required_if:session,brand',
    //         'influencerCategory' => 'required_if:session,influencer',
    //     ], [
    //         'brandCategory.required_if' => 'The brand category field is required when you choose brand role.',
    //         'influencerCategory.required_if' => 'The influencer category field is required when you choose influencer.',
    //     ]);

    //     return $validation;
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     try {
    //         $new_str = str_replace(' ', '', $data['username']);

    //         $user = User::create([
    //             'name' => $data['name'],
    //             'username' => $data['username'],
    //             'email' => $data['email'],
    //             'categoryId' => $data['categoryId'],
    //             'package' => "FREE",
    //             'mobileno' => $data['mobileno'],
    //             'session' => $data['session'],
    //             'password' => Hash::make($data['password']),
    //         ]);

    //         // $email = User::where('email', '=', $data['email'])->get();
    //         // return $email;

    //         if ($data['session'] == 'brand') {
    //             $user->assignRole(['Brand']);
    //             if (!empty($data['brandCategory'])) {
    //                 foreach ($data['brandCategory'] as $brandCategoryId) {
    //                     $brandCategory = new BrandWithCategory();
    //                     $brandCategory->brandCategoryId = $brandCategoryId;
    //                     $brandCategory->brandId = $user->id;
    //                     $brandCategory->save();
    //                 }
    //             }
    //         } else {
    //             $user->assignRole(['Influencer']);
    //             $influencer = new InfluencerProfile();
    //             $influencer->userId = $user->id;
    //             $influencer->contactNo = $user->mobileno;

    //             if (!empty($data['influencerCategory'])) {
    //                 // Serialize the array of category IDs to a JSON string
    //                 $influencer->categoryId = json_encode($data['influencerCategory']);
    //             }
    //             $influencer->save();
    //         }

    //         $id = $user->id;
    //         $mycode = $new_str . $id;
    //         $userUpdate = User::find($id);
    //         $userUpdate->myrefer = $mycode;
    //         $userUpdate->assignRole('User');
    //         $userUpdate->save();

    //         $code = $user->refer;
    //         if ($code) {

    //             $pointableUser = User::where('myrefer', '=', $code)->first();

    //             $userPoint = new Point();
    //             $userPoint->userId = $pointableUser->id;
    //             $userPoint->point = 50;
    //             $userPoint->save();
    //         }
    //         return $user;
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }
    public function showRegistrationForm()
    {
        // 🟢 Fetch all Brand Categories and pass to view
        $brandCategory = BrandCategory::all();

        return view('auth.register', compact('brandCategory'));
    }

    /**
     * Get a validator for an incoming registration request.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobileno' => ['required', 'string', 'max:15'],
            'session' => ['required', 'string'], // brand or influencer
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after valid registration.
     */

    // protected function create(array $data)
    // {
    //     try {
    //         // 🟢 Remove spaces for referral code generation
    //         $new_str = str_replace(' ', '', $data['username']);

    //         // 🟢 Create user entry
    //         $user = User::create([
    //             'name'       => $data['name'],
    //             'username'   => $data['username'],
    //             'email'      => $data['email'],
    //             'mobileno'   => $data['mobileno'],
    //             'session'    => $data['session'], // 'brand' or 'influencer'
    //             'password'   => Hash::make($data['password']),
    //             'package'    => 'FREE',
    //             'categoryId' => isset($data['brandCategory'])
    //                 ? implode(',', $data['brandCategory'])
    //                 : (isset($data['influencerCategory'])
    //                     ? implode(',', $data['influencerCategory'])
    //                     : null),
    //         ]);

    //         // 🟢 If Brand selected
    //         if ($data['session'] === 'brand') {
    //             $user->assignRole('Brand');

    //             $brand = new BrandWithCategory();
    //             $brand->userId = $user->id;
    //             $brand->contactNo = $data['mobileno'];

    //             if (!empty($data['brandCategory'])) {
    //                 $brand->categoryId = json_encode($data['brandCategory']);
    //             }

    //             $brand->save();
    //         }

    //         // 🟢 If Influencer selected
    //         if ($data['session'] === 'influencer') {
    //             $user->assignRole('Influencer');

    //             $influencer = new InfluencerProfile();
    //             $influencer->userId = $user->id;
    //             $influencer->contactNo = $data['mobileno'];

    //             if (!empty($data['influencerCategory'])) {
    //                 $influencer->categoryId = json_encode($data['influencerCategory']);
    //             }

    //             $influencer->save();
    //         }

    //         // 🟢 Generate referral code
    //         $mycode = $new_str . $user->id;
    //         $user->myrefer = $mycode;
    //         $user->assignRole('User');
    //         $user->save();

    //         // 🟢 Referral point system
    //         if (!empty($user->refer)) {
    //             $pointableUser = User::where('myrefer', $user->refer)->first();
    //             if ($pointableUser) {
    //                 Point::create([
    //                     'userId' => $pointableUser->id,
    //                     'point'  => 50,
    //                 ]);
    //             }
    //         }

    //         // 🟢 Redirect based on user session type
    //         if ($user->session === 'brand') {
    //             return redirect()->route('brand.dashboard', ['id' => $user->id])
    //                 ->with('success', 'Brand registered successfully!');
    //         }

    //         if ($user->session === 'influencer') {
    //             return redirect()->route('influencer.dashboard', ['id' => $user->id])
    //                 ->with('success', 'Influencer registered successfully!');
    //         }

    //         // Default redirect
    //         return redirect()->route('home')->with('success', 'User registered successfully!');
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    // protected function create(array $data)
    // {
    //     try {
    //         // 🟢 1️⃣ Sanitize username for referral
    //         $new_str = str_replace(' ', '', $data['username']);

    //         // 🟢 2️⃣ Create User record
    //         $user = User::create([
    //             'name'       => $data['name'],
    //             'username'   => $data['username'],
    //             'email'      => $data['email'],
    //             'mobileno'   => $data['mobileno'],
    //             'session'    => $data['session'], // 'brand' or 'influencer'
    //             'password'   => Hash::make($data['password']),
    //             'package'    => 'FREE',
    //             'categoryId' => isset($data['brandCategory'])
    //                 ? implode(',', $data['brandCategory'])
    //                 : (isset($data['influencerCategory'])
    //                     ? implode(',', $data['influencerCategory'])
    //                     : null),
    //         ]);

    //         // 🟢 3️⃣ Save specific type data
    //         // if ($data['session'] === 'brand') {
    //         //     // Assign brand role
    //         //     $user->assignRole('Brand');

    //         //     // Save brand profile
    //         //     $brand = new BrandWithCategory();
    //         //     $brand->brandCategoryId  = $data['brandCategoryId']; // $brandCategoryId->id;
    //         //     // $brand->mobileNo = $data['mobileno'];
    //         //     if (!empty($data['brandCategory'])) {
    //         //         $brand->categoryId = json_encode($data['brandCategory']);
    //         //     }
    //         //     $brand->save();

    //         //     // Redirect to brand dashboard
    //         //     $this->redirectTo = route('brand.dashboard', ['id' => $user->id]);
    //         // }
    //         if ($data['session'] === 'brand') {
    //             // Assign brand role
    //             $user->assignRole('Brand');

    //             // Create new BrandWithCategory record
    //             $brand = new BrandWithCategory();
    //             $brand->brandId = $user->id;

    //             // handle multiple select
    //             if (!empty($data['brandCategory'])) {
    //                 // pick the first selected category (since your table can store only one)
    //                 $brand->brandCategoryId = $data['brandCategory'][0];
    //             }

    //             $brand->save();

    //             // Redirect to brand dashboard
    //             $this->redirectTo = route('home', ['id' => $user->id]);
    //         }




    //         if ($data['session'] === 'influencer') {
    //             // Assign influencer role
    //             $user->assignRole('Influencer');

    //             // Save influencer profile
    //             $influencer = new InfluencerProfile();
    //             $influencer->userId = $user->id;
    //             $influencer->contactNo = $data['mobileno'];
    //             if (!empty($data['influencerCategory'])) {
    //                 $influencer->categoryId = json_encode($data['influencerCategory']);
    //             }
    //             $influencer->save();

    //             // Redirect to influencer dashboard
    //             $this->redirectTo = route('influencer.dashboard', ['id' => $user->id]);
    //         }

    //         // 🟢 4️⃣ Generate referral code
    //         $user->myrefer = $new_str . $user->id;
    //         $user->assignRole('User');
    //         $user->save();

    //         // 🟢 5️⃣ Handle referral points
    //         if (!empty($user->refer)) {
    //             $pointableUser = User::where('myrefer', $user->refer)->first();
    //             if ($pointableUser) {
    //                 Point::create([
    //                     'userId' => $pointableUser->id,
    //                     'point'  => 50,
    //                 ]);
    //             }
    //         }

    //         return $user;
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    protected function create(array $data)
    {
        try {
            // 1️⃣ Clean username for referral
            $new_str = str_replace(' ', '', $data['username']);

            // 2️⃣ Create user record
            $user = User::create([
                'name'       => $data['name'],
                'username'   => $data['username'],
                'email'      => $data['email'],
                'mobileno'   => $data['mobileno'],
                'session'    => $data['session'], // brand or influencer
                'password'   => Hash::make($data['password']),
                'package'    => 'FREE',
                'categoryId' => isset($data['influencerCategory'])
                    ? implode(',', $data['influencerCategory'])
                    : (isset($data['brandCategory'])
                        ? implode(',', $data['brandCategory'])
                        : null),
            ]);

            // 3️⃣ Session-based data handling
            if ($data['session'] === 'brand') {
                // Assign brand role
                $user->assignRole('Brand');

                // ✅ No extra table entry for brand
                $this->redirectTo = route('home', ['id' => $user->id]);
            }

            if ($data['session'] === 'influencer') {
                // Assign influencer role
                $user->assignRole('Influencer');

                // Save influencer profile
                $influencer = new InfluencerProfile();
                $influencer->userId = $user->id;
                $influencer->contactNo = $data['mobileno'];

                if (!empty($data['influencerCategory'])) {
                    $influencer->categoryId = json_encode($data['influencerCategory']);
                }

                $influencer->save();

                $this->redirectTo = route('home', ['id' => $user->id]);
            }

            // 4️⃣ Assign common User role
            $user->assignRole('User');

            // 5️⃣ Generate referral code
            $user->myrefer = $new_str . $user->id;
            $user->save();

            // 6️⃣ Handle referral points
            if (!empty($user->refer)) {
                $pointableUser = User::where('myrefer', $user->refer)->first();
                if ($pointableUser) {
                    Point::create([
                        'userId' => $pointableUser->id,
                        'point'  => 50,
                    ]);
                }
            }

            return $user;
        } catch (\Throwable $th) {
            
            throw $th;
        }
    }
}
