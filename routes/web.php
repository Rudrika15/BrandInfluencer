<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PricingController;
use App\Http\Controllers\Admin\user\SubscriptionpackageController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\brand\BrandPackageDetailController;
use App\Http\Controllers\brand\CampaignController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\influencer\InfluencerController;
use App\Http\Controllers\influencer\InfluencerPackagesController;
use App\Http\Controllers\influencer\InfluencerPortfolioController;
use App\Http\Controllers\influencer\InfluencerStepController;
use App\Http\Controllers\user\BrochureController;
use App\Http\Controllers\user\FeedbackController;
use App\Http\Controllers\user\InquiryController;
use App\Http\Controllers\user\LinkController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\QrcodeController;
use App\Http\Controllers\user\ServiceController;
use App\Http\Controllers\user\SliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomepageController::class, 'index'])->name('home');
    Route::post('/update-session', [HomepageController::class, 'updateSession'])->name('update.session');


    // influencer routes

    Route::get('influencer/dashboard', [DashboardController::class, 'dashboard'])->name('influencer.dashboard');

    // user Profile
    Route::get('user/profile', [DashboardController::class, 'edit'])->name('profile');
    Route::get('mycard/{name?}', [DashboardController::class, 'index'])->name('user.card');
    Route::post('card/store', [DashboardController::class, 'store'])->name('card.store');
    Route::get('photo-delete/{id?}', [DashboardController::class, 'photodestroy'])->name('photo.delete');


    // Link
    Route::post('link/update', [LinkController::class, 'update'])->name('link.update');
    Route::get('detail-delete/{id?}', [LinkController::class, 'delete'])->name('detail.delete');

    // payment
    Route::post('payment/update', [PaymentController::class, 'update'])->name('payment.update');


    // Service Details
    Route::get('serviceDetails/index', [SubscriptionpackageController::class, 'index'])->name('servicedetail.index');

    // Card Service
    Route::post('serviceDetails/store', [ServiceController::class, 'store'])->name('servicedetail.store');
    Route::get('serviceDetails/edit/{id?}', [ServiceController::class, 'edit'])->name('servicedetail.edit');
    Route::post('serviceDetails/update', [ServiceController::class, 'update'])->name('servicedetail.update');
    Route::get('serviceDetails/delete/{id?}', [ServiceController::class, 'destroy'])->name('servicedetail.delete');

    // QR Codes
    Route::post('qrcode/store', [QrcodeController::class, 'store'])->name('qrcode.store');
    Route::get('qr/delete/{id?}', [QrcodeController::class, 'destroy'])->name('qr.delete');
    Route::get('slider/delete/{id?}', [SliderController::class, 'destroy'])->name('slider.delete');

    // Feedback Form
    Route::post('feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('feedback/index', [FeedbackController::class, 'index'])->name('feed.index');

    // Inquiry
    Route::post('inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');
    Route::get('inquiry/index', [InquiryController::class, 'index'])->name('inquiry.index');

    //brou
    Route::post('brochure/store', [BrochureController::class, 'store'])->name('bro.store');
    Route::get('brochure/delete/{id?}', [BrochureController::class, 'destroy'])->name('bro.delete');


    // slider
    Route::post('/sliders', [DashboardController::class, 'sliders'])->name('sliders');



    // endprofile

    // influencer profile
    Route::get('influencer/profile', [InfluencerController::class, 'influencerProfile'])->name('influencer.profile');
    Route::get('influencer/edit/{id?}', [InfluencerController::class, 'edit'])->name('influencer.profile.edit');
    Route::post('influencer/update', [InfluencerController::class, 'update'])->name('influencer.profile.update');
    Route::get('influencer/brands', [InfluencerController::class, 'brands'])->name('influencer.brands');
    Route::get('influencer/campaign/{id?}', [InfluencerController::class, 'campaigns'])->name('influencer.campaignView');
    Route::post('influencer/campaignApply', [InfluencerController::class, 'campaignApply'])->name('influencer.campaignApply');
    Route::get('influencer/campaignApplyList', [InfluencerController::class, 'campaignApplyList'])->name('influencer.campaignApplyList');
    Route::get('influencer/appliedPhotoDelete/{id?}', [InfluencerController::class, 'appliedPhotoDelete'])->name('appliedPhotoDelete');

    // Applies
    Route::get('influencer/campaign/appliersCreate/{campaignId?}/{userId?}', [InfluencerController::class, 'appliersCreate'])->name('brand.campaign.appliersCreate');
    Route::post('influencer/campaign/appliersCreateStore', [InfluencerController::class, 'appliersCreateStore'])->name('brand.campaign.appliersCreateStore');

    Route::get('influencer/campaign/step/{campaignId?}', [InfluencerStepController::class, 'index'])->name('brand.campaign.campaign.step');
    Route::post('influencer/campaign/step', [InfluencerStepController::class, 'store'])->name('influencer.campaign.step.store');



    // influencer status management
    Route::get('brand/campaign/influencer/approval/{campaignId?}/{userId?}', [CampaignController::class, 'influencerApproval'])->name('brand.campaign.influencerApproval');
    Route::get('brand/campaign/influencer/hold/{campaignId?}/{userId?}', [CampaignController::class, 'influencerOnHold'])->name('brand.campaign.influencerOnHold');
    Route::get('brand/campaign/influencer/reject/{campaignId?}/{userId?}', [CampaignController::class, 'influencerReject'])->name('brand.campaign.influencerReject');
    Route::get('brand/campaign/influencer/detail/{campaignId?}/{userId?}', [CampaignController::class, 'influencerDetail'])->name('brand.campaign.influencerDetail');
    Route::get('brand/campaign/influencer/portfolio/{campaignId?}/{userId?}', [CampaignController::class, 'influencerPortfolio'])->name('brand.campaign.influencerPortfolio');


    // influencer content Management
    Route::get('brand/campaign/influencer/content/approval/{campaignId?}/{userId?}/{id?}', [CampaignController::class, 'influencerContentApproval'])->name('brand.campaign.influencerContentApproval');
    Route::get('brand/campaign/influencer/content/hold/{campaignId?}/{userId?}/{id?}', [CampaignController::class, 'influencerContentOnHold'])->name('brand.campaign.influencerContentOnHold');
    Route::post('brand/campaign/influencer/content/reject/{campaignId?}/{userId?}/{id?}', [CampaignController::class, 'influencerContentReject'])->name('brand.campaign.influencerContentReject');
    Route::get('brand/brandPointLog', [CampaignController::class, 'brandPointLog'])->name('brand.log');

    // influencer Portfolio
    Route::get('influencer/portfolio', [InfluencerPortfolioController::class, 'index'])->name('influencer.portfolio.index');
    Route::get('influencer/portfolio/create', [InfluencerPortfolioController::class, 'create'])->name('influencer.portfolio.create');
    Route::post('influencer/portfolio/store', [InfluencerPortfolioController::class, 'store'])->name('influencer.portfolio.store');
    Route::get('influencer/portfolio/edit/{id?}', [InfluencerPortfolioController::class, 'edit'])->name('influencer.portfolio.edit');
    Route::post('influencer/portfolio/update', [InfluencerPortfolioController::class, 'update'])->name('influencer.portfolio.update');
    Route::get('influencer/portfolio/delete/{id?}', [InfluencerPortfolioController::class, 'delete'])->name('influencer.portfolio.delete');

    // influencer packages
    Route::get('influencer/package/index', [InfluencerPackagesController::class, 'index'])->name('influencer.package.index');
    Route::get('influencer/package/create', [InfluencerPackagesController::class, 'create'])->name('influencer.package.create');
    Route::post('influencer/package/store', [InfluencerPackagesController::class, 'store'])->name('influencer.package.store');
    Route::get('influencer/package/edit/{id?}', [InfluencerPackagesController::class, 'edit'])->name('influencer.package.edit');
    Route::post('influencer/package/update', [InfluencerPackagesController::class, 'update'])->name('influencer.package.update');
    Route::get('influencer/package/delete/{id?}', [InfluencerPackagesController::class, 'destroy'])->name('influencer.package.delete');
    Route::get('influencer/package', [InfluencerPackagesController::class, 'packageView'])->name('influencer.packages');


    // brand 

    // campaign
    Route::get('brand/campaign/index', [CampaignController::class, 'index'])->name('brand.campaign.index');
    Route::get('brand/campaign/create', [CampaignController::class, 'create'])->name('brand.campaign.create');
    Route::post('brand/campaign/store', [CampaignController::class, 'store'])->name('brand.campaign.store');
    Route::get('brand/campaign/edit/{id?}', [CampaignController::class, 'edit'])->name('brand.campaign.edit');
    Route::post('brand/campaign/update', [CampaignController::class, 'update'])->name('brand.campaign.update');
    Route::get('brand/campaign/delete/{id?}', [CampaignController::class, 'delete'])->name('brand.campaign.delete');
    Route::get('brand/campaign/appliers', [CampaignController::class, 'appliers'])->name('brand.campaign.appliers');

    // Payment 

    Route::get('payment', [PricingController::class, 'index']);
    Route::post('razorpay-payment', [PricingController::class, 'store'])->name('razorpay.payment.store');

    // 
    Route::get('brand/pricing', [BrandPackageDetailController::class, 'pricingView'])->name('brand.pricing');


    // pricing

    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');
    // Route::post('/pricing/payment', [PricingController::class, 'store'])->name('pay');

    // influencer list for brand
    Route::get('brand/influencerList', [CampaignController::class, 'influencerList'])->name('brand.influencerList');
    Route::get('brand/influencerList/profile/{id?}', [CampaignController::class, 'influencerProfile'])->name('brand.influencerProfile');
    Route::post('brand/influencerPointCode', [CampaignController::class, 'influencerContactPoint'])->name('brand.influencerContactPoint');

    // brand log
    Route::get('brand/brandPointLog', [CampaignController::class, 'brandPointLog'])->name('brand.log');


    // Chat Functionality
    Route::get('influencer/chat/index', [ChatController::class, 'influencerChatIndex'])->name('influencer.chat.index');
    Route::post('influencer/chat/store', [ChatController::class, 'sendMessageInfluencer'])->name('influencer.chat.store');
    Route::get('/chats/messages/{receiverId}', [ChatController::class, 'fetchBrandMessages'])->name('influencer.chats.messages');

    // find new chat 
    Route::get('/new/chats', [ChatController::class, 'findNewChat'])->name('find.new.chat');
    // searched user get into the chat
    Route::post('/add-user-to-table', [ChatController::class, 'addUserToTable'])->name('add.user.to.table');


    // Route::get('/chats/messages/{receiverId}', 'ChatController@fetchMessages')->name('chats.messages');
});

// OTP 

Route::controller(OtpController::class)->group(function () {
    Route::get('loginn', 'login')->name('otp.login');
    Route::get('auth/checkotp', 'checkotp')->name('auth.checkotp');
    Route::post('auth/loginotp/{id?}', 'loginotp')->name('auth.loginotp');
    Route::post('otp/generate', 'generate')->name('otp.generate');
});

// influencer details
Route::get('/influencer', [HomepageController::class, 'influencer'])->name('main.influencer');
Route::get('/influencer/profile/{id?}', [HomepageController::class, 'influencerProfileView'])->name('main.influencer.profile');


Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/contact', [HomepageController::class, 'contact'])->name('contact');
Route::get('/privacy', [HomepageController::class, 'privacy'])->name('privacy');
Route::get('/refund', [HomepageController::class, 'refund'])->name('refund');
Route::get('/term', [HomepageController::class, 'term'])->name('term');
