<?php

use App\Http\Controllers\admin\ActivityController;
use App\Http\Controllers\admin\BrandCategoryController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CategoryInfluencerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ManualPaymentController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\PricingController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\TemplateDetailController;
use App\Http\Controllers\admin\TemplatemasterController;
use App\Http\Controllers\Admin\user\SubscriptionpackageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\WriterDesignerController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\brand\BrandPackageController;
use App\Http\Controllers\brand\BrandPackageDetailController;
use App\Http\Controllers\brand\CampaignController;
use App\Http\Controllers\brand\DashboardController as BrandDashboardController;
use App\Http\Controllers\brand\InstaMojoPaymentController;
use App\Http\Controllers\BrandInfluencerNotificationController;
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
use App\Models\Categories;
use App\Models\CategoryInfluencer;
use App\Models\InfluencerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    $categories = CategoryInfluencer::all();
    $influencers = InfluencerProfile::all();
    $categoryInfluencer = CategoryInfluencer::with('Influencer')->whereHas('Influencer')->get();
    return view('welcome', compact('influencers', 'categories', 'categoryInfluencer'));
});

Route::post('brandDetails', [HomepageController::class, 'brandDetails'])->name('brandDetails');



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

// Route::middleware('optimizeImages')->group(
//     function () {
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomepageController::class, 'index'])->name('home');
    Route::get('/search', [App\Http\Controllers\HomepageController::class, 'search'])->name('search');

    Route::post('/update-session', [HomepageController::class, 'updateSession'])->name('update.session');

    // notification
    Route::get('/influencer/notifications', [BrandInfluencerNotificationController::class, 'index'])->name('influencer.notifications');

    // influencer routes

    Route::get('influencer/dashboard', [DashboardController::class, 'dashboard'])->name('influencer.dashboard');

    Route::get('influencer/profile/{id?}', [DashboardController::class, 'influencerProfile'])->name('general.influencerProfile');

    // user Profile
    Route::get('user/profile', [DashboardController::class, 'edit'])->name('profile');
    Route::get('user/profile/edit/{id}', [DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::get('mycard/{name?}', [DashboardController::class, 'index'])->name('user.card');
    Route::post('card/store', [DashboardController::class, 'store'])->name('card.store');
    Route::post('category/update', [DashboardController::class, 'categoryUpdate'])->name('category.update');
    Route::post('portfolio/update', [DashboardController::class, 'addPortfolio'])->name('influencer.portfolio.storeOrupdate');
    Route::get('delete/portfolio/{id}', [DashboardController::class, 'deletePortfolio'])->name('portfolio.delete');


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
    Route::get('influencer/export', [InfluencerController::class, 'export'])->name('influencer.export');

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
    Route::get('brand/campaign/index/', [CampaignController::class, 'index'])->name('brand.campaign.index');
    Route::get('brand/campaign/create', [CampaignController::class, 'create'])->name('brand.campaign.create');
    Route::post('brand/campaign/store', [CampaignController::class, 'store'])->name('brand.campaign.store');
    Route::get('brand/campaign/edit/{id?}', [CampaignController::class, 'edit'])->name('brand.campaign.edit');
    Route::post('brand/campaign/update', [CampaignController::class, 'update'])->name('brand.campaign.update');
    Route::get('brand/campaign/delete/{id?}', [CampaignController::class, 'delete'])->name('brand.campaign.delete');
    Route::get('brand/campaign/appliers/{id}', [CampaignController::class, 'appliers'])->name('brand.campaign.appliers');

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
    Route::post('new/influencer/chat/index', [ChatController::class, 'newInfluencerChatIndex'])->name('new.influencer.chat.index');
    Route::post('new/brand/chat/index', [ChatController::class, 'newBrandChatIndex'])->name('new.brand.chat.index');
    Route::post('influencer/chat/store', [ChatController::class, 'sendMessageInfluencer'])->name('influencer.chat.store');
    Route::get('/chats/messages/{receiverId}/{influencerId?}', [ChatController::class, 'fetchBrandMessages'])->name('influencer.chats.messages');

    // find new chat 
    Route::get('/new/chats', [ChatController::class, 'findNewChat'])->name('find.new.chat');
    Route::post('/new/chats/store', [ChatController::class, 'firstChatStore'])->name('find.new.chat.store');
    // searched user get into the chat
    Route::post('/add-user-to-table', [ChatController::class, 'addUserToTable'])->name('add.user.to.table');


    // Route::get('/chats/messages/{receiverId}', 'ChatController@fetchMessages')->name('chats.messages');



    // admin side

    Route::get('/admin/home', [DashboardController::class, 'dashboard'])->name('admin.dashboard');


    // campaign list at admin side 

    Route::get('admin/campaign/list', [DashboardController::class, 'campaignList'])->name('admin.campaign.list');


    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/assign/roles', [UserController::class, 'assignRoles'])->name('users.assignRole');
    Route::get('/assign/roles/create/{id?}', [UserController::class, 'assignRoleCreate'])->name('users.assignRoleCreate');
    Route::post('/assign/roles/code', [UserController::class, 'assignRoleCreateCode'])->name('users.assignRoleCreateCode');


    // brand side
    Route::get('/admin/brand/index', [UserController::class, 'brandList'])->name('admin.brand.list');
    Route::get('/admin/brand/offer/create/{id?}', [UserController::class, 'brandOfferAdd'])->name('admin.brand.offer.create');
    Route::get('/admin/brand/create', [UserController::class, 'addBrand'])->name('admin.brand.create');
    Route::post('/admin/brand/store', [UserController::class, 'addBrandCode'])->name('admin.brand.store');




    // influencer category
    Route::get('influencer/category/index', [CategoryInfluencerController::class, 'index'])->name('influencer.index');
    Route::get('influencer/list', [CategoryInfluencerController::class, 'list'])->name('influencer.list');
    Route::get('influencer/singleView/{id?}', [CategoryInfluencerController::class, 'singleView'])->name('influencer.singleView');
    Route::get('influencer/statusEdit/{id?}', [CategoryInfluencerController::class, 'statusEdit'])->name('influencer.statusEdit');
    Route::post('influencer/statusEditCode', [CategoryInfluencerController::class, 'statusEditCode'])->name('influencer.statusEditCode');
    Route::get('influencer/category/create', [CategoryInfluencerController::class, 'create'])->name('influencer.create');
    Route::post('influencer/category/store', [CategoryInfluencerController::class, 'store'])->name('influencer.store');
    Route::get('influencer/category/edit/{id?}', [CategoryInfluencerController::class, 'edit'])->name('influencer.edit');
    Route::post('influencer/category/update', [CategoryInfluencerController::class, 'update'])->name('influencer.update');
    Route::get('influencer/category/delete/{id?}', [CategoryInfluencerController::class, 'destroy'])->name('influencer.delete');



    // Brand Category
    Route::get('brand/category/index', [BrandCategoryController::class, 'index'])->name('brand.category.index');
    Route::get('brand/category/create', [BrandCategoryController::class, 'create'])->name('brand.category.create');
    Route::post('brand/category/store', [BrandCategoryController::class, 'store'])->name('brand.category.store');
    Route::get('brand/category/edit/{id?}', [BrandCategoryController::class, 'edit'])->name('brand.category.edit');
    Route::post('brand/category/update', [BrandCategoryController::class, 'update'])->name('brand.category.update');
    Route::get('brand/category/delete/{id?}', [BrandCategoryController::class, 'delete'])->name('brand.category.delete');


    // brand Packages activity
    Route::get('admin/brand/package/activity/index', [ActivityController::class, 'index'])->name('admin.brand.activity.index');
    Route::get('admin/brand/package/activity/create', [ActivityController::class, 'create'])->name('admin.brand.activity.create');
    Route::post('admin/brand/package/activity/store', [ActivityController::class, 'store'])->name('admin.brand.activity.store');
    Route::get('admin/brand/package/activity/edit/{id?}', [ActivityController::class, 'edit'])->name('admin.brand.activity.edit');
    Route::post('admin/brand/package/activity/update', [ActivityController::class, 'update'])->name('admin.brand.activity.update');
    Route::get('admin/brand/package/activity/delete/{id?}', [ActivityController::class, 'delete'])->name('admin.brand.activity.delete');


    // Payment REPORT

    Route::get('/paymentReport/index', [ManualPaymentController::class, 'index'])->name('paymentReport.index');
    Route::post('/changeStatus', [ManualPaymentController::class, 'changeStatus'])->name('paymentReport.changeStatus');
    Route::post('/updateUserPackage', [ManualPaymentController::class, 'updateUserPackage'])->name('updateUserPackage');


    // brand Packages
    Route::get('admin/package/index', [BrandPackageController::class, 'index'])->name('admin.brand.package.index');
    Route::get('admin/package/create', [BrandPackageController::class, 'create'])->name('admin.brand.package.create');
    Route::post('admin/package/store', [BrandPackageController::class, 'store'])->name('admin.brand.package.store');
    Route::get('admin/package/edit/{id?}', [BrandPackageController::class, 'edit'])->name('admin.brand.package.edit');
    Route::post('admin/package/update', [BrandPackageController::class, 'update'])->name('admin.brand.package.update');
    Route::get('admin/package/delete/{id?}', [BrandPackageController::class, 'destroy'])->name('admin.brand.package.delete');

    // brand package details
    Route::get('admin/package/detail/index/{id?}', [BrandPackageDetailController::class, 'index'])->name('admin.brand.package.detail.index');
    Route::post('admin/package/detail/store', [BrandPackageDetailController::class, 'store'])->name('admin.brand.package.detail.store');
    Route::get('admin/package/detail/delete/{id?}', [BrandPackageDetailController::class, 'delete'])->name('admin.brand.package.detail.delete');

    Route::get('brand/pricing', [BrandPackageDetailController::class, 'pricingView'])->name('brand.pricing');

    // brand payment
    // Route::group(['prefix' => 'instamojopayments'], function () {
    //     Route::post('/pay', [InstaMojoPaymentController::class, 'pay'])->name('pay');
    //     Route::any('/success', [InstaMojoPaymentController::class, 'success']);
    // });



});
    // }
// );
