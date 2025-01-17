<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\admin\BrandCategoryController;
use App\Http\Controllers\Controller;
use App\Models\BrandWithCategory;
use App\Models\Brochure;
use App\Models\Cardportfoilo;
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
    protected function validator(array $data)
    {
        $validation = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobileno' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'brandCategory' => 'required_if:session,brand',
            'influencerCategory' => 'required_if:session,influencer',
        ], [
            'brandCategory.required_if' => 'The brand category field is required when you choose brand role.',
            'influencerCategory.required_if' => 'The influencer category field is required when you choose influencer.',
        ]);

        return $validation;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        try {
            $new_str = str_replace(' ', '', $data['username']);

            $user = User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'package' => "FREE",
                'mobileno' => $data['mobileno'],
                'session' => $data['session'],
                'password' => Hash::make($data['password']),
            ]);

            // $email = User::where('email', '=', $data['email'])->get();
            // return $email;

            if ($data['session'] == 'brand') {
                $user->assignRole(['Brand']);
                if (!empty($data['brandCategory'])) {
                    foreach ($data['brandCategory'] as $brandCategoryId) {
                        $brandCategory = new BrandWithCategory();
                        $brandCategory->brandCategoryId = $brandCategoryId;
                        $brandCategory->brandId = $user->id;
                        $brandCategory->save();
                    }
                }
            } else {
                $user->assignRole(['Influencer']);
                $influencer = new InfluencerProfile();
                $influencer->userId = $user->id;
                $influencer->contactNo = $user->mobileno;

                if (!empty($data['influencerCategory'])) {
                    // Serialize the array of category IDs to a JSON string
                    $influencer->categoryId = json_encode($data['influencerCategory']);
                }
                $influencer->save();
            }

            $id = $user->id;
            $mycode = $new_str . $id;
            $userUpdate = User::find($id);
            $userUpdate->myrefer = $mycode;
            $userUpdate->save();

            $code = $user->refer;
            if ($code) {

                $pointableUser = User::where('myrefer', '=', $code)->first();

                $userPoint = new Point();
                $userPoint->userId = $pointableUser->id;
                $userPoint->point = 50;
                $userPoint->save();
            }
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
