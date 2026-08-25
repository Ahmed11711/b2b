<?php

use \App\Http\Controllers\Api\ContactRequest\ContactRequestController;
use App\Http\Controllers\Admin\Bag\BagController;
use App\Http\Controllers\Admin\BagItems\BagItemsController;
use App\Http\Controllers\Admin\Branch\BranchController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\MyCertificate\MyCertificateController;
use App\Http\Controllers\Admin\Posts\PostsController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\Project\ProjectStatsController;
use App\Http\Controllers\Admin\UserInfo\UserInfoController;
use App\Http\Controllers\Admin\Verification\VerificationController;
use App\Http\Controllers\Api\ApplyPosts\AllpostsToApplayController;
use App\Http\Controllers\Api\Backage\BackageFeatureController;
use App\Http\Controllers\Api\Backage\PackageUsageController;
use App\Http\Controllers\Api\Bids\BidsController;
use App\Http\Controllers\Api\Bids\Statistics\PostStatisticsController;
use App\Http\Controllers\Api\Bids\Statistics\StatisticsController;
use App\Http\Controllers\Api\Dashboard\DashboardController;
use App\Http\Controllers\Api\MyCategory\MyCategoryController;
use App\Http\Controllers\Api\Posts\PostsApiController;
use App\Http\Controllers\Api\Profile\ProfileAccountController;
use App\Http\Controllers\Api\Service\ServiceApiController;
use App\Http\Controllers\Api\Service\ServiceStatsController;
use App\Http\Controllers\Api\Subscribe\SubscribeController;
use App\Http\Controllers\Api\UserContact\UserContactController;
use App\Http\Controllers\Api\Verification\VerificationApiController;
use App\Http\Controllers\Auth\CreateAcountController;
use App\Http\Controllers\Auth\LoginAccountController;



use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\User\AllProviders\AllProvidersController;
use App\Http\Controllers\User\Reviews\ReviewsController;
use App\Http\Middleware\CheckFeatureLimit;
use App\Http\Middleware\CheckJwtToken;
use App\Http\Middleware\RecordPostView;
use App\Http\Middleware\TrackProviderVisits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;






























Route::group(['prefix' => 'v1/auth'], function () {
    Route::get('cities', [CityController::class, 'index']);

    // Public Routes
    Route::post('register', [CreateAcountController::class, 'register']);
    Route::post('login', [LoginAccountController::class, 'login']);
    Route::post('social-login', [LoginAccountController::class, 'socialLogin']);

    Route::group(['middleware' => CheckJwtToken::class], function () {
        Route::get('me', [ProfileController::class, 'me']);
        Route::post('refresh', [LoginAccountController::class, 'refresh']);
        Route::post('logout', [ProfileController::class, 'logout']);
    });
    Route::post('send-otp', [OtpController::class, 'send'])
        ->defaults('context', 'register');

    Route::post('verify-otp', [OtpController::class, 'verify'])
        ->defaults('context', 'register');

    // Password Reset Flow
    Route::post('/forget-password/send-otp', [OtpController::class, 'send'])
        ->defaults('context', 'forget_password');

    Route::post('/forget-password/verify-otp', [OtpController::class, 'verify'])
        ->defaults('context', 'forget_password');
});

Route::prefix('v1/user')->group(function () {
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('all-provider', [AllProvidersController::class, 'allProvider']);
    Route::get('top-provider', [AllProvidersController::class, 'topProviders']);
    Route::get('one-provider/{id}', [AllProvidersController::class, 'oneProvider'])->middleware(TrackProviderVisits::class);
    Route::get('get-service/{service_id}', [ServiceApiController::class, 'show'])->middleware(TrackProviderVisits::class);
    Route::get('get-project/{id}', [ProjectController::class, 'show'])
        ->name('project.show')
        ->middleware(TrackProviderVisits::class);
    Route::get('bags', [BagController::class, 'index']);
    Route::get('bags/{id}', [BagController::class, 'show']);
    Route::get('bag_items', [BagItemsController::class, 'index']);
    Route::get('bag_items/{id}', [BagItemsController::class, 'show']);
    Route::get('city', [CityController::class, 'index']);
});



Route::middleware(CheckJwtToken::class)->prefix('v1/user')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::post('review-service', [ReviewsController::class, 'store']);
    Route::post('contact-requests', [ContactRequestController::class, 'store']);
    Route::apiResource('posts', PostsApiController::class);
    Route::put('my-profile', [ProfileAccountController::class, 'update']);
    Route::get('my-profile', [ProfileAccountController::class, 'show']);
    Route::get('my-category', [MyCategoryController::class, 'index']);
    Route::post('my-category', [MyCategoryController::class, 'store']);
    Route::get('posts/{postId}/statistics', [PostStatisticsController::class, 'show']);
    Route::put('my-socialMedia', [UserContactController::class, 'upsert']);
    Route::get('my-socialMedia', [UserContactController::class, 'index']);
});


// provider 
Route::middleware(CheckJwtToken::class)->prefix('v1/provider')->group(function () {
    Route::get('my-category', [MyCategoryController::class, 'index']);
    Route::post('my-category', [MyCategoryController::class, 'store']);
    // social media
    Route::put('my-socialMedia', [UserContactController::class, 'upsert']);
    Route::get('my-socialMedia', [UserContactController::class, 'index']);
    // service
    Route::resource('my-service', ServiceApiController::class)->except(['store']);
    Route::post('my-service', [ServiceApiController::class, 'store'])
        ->middleware(CheckFeatureLimit::class . ':service');
    Route::get('my-service/{id}/stats', [ServiceStatsController::class, 'show']);


    // info
    Route::apiResource('my-info', UserInfoController::class)->only(['index', 'store', 'update']);

    Route::get('city', [CityController::class, 'index']);
    Route::put('my-profile', [ProfileAccountController::class, 'update']);
    Route::get('my-profile', [ProfileAccountController::class, 'show']);


    Route::apiResource('my-projects', ProjectController::class)
        ->names(['show' => 'provider.project.show']);
    Route::get('my-projects/{id}/stats', [ProjectStatsController::class, 'show']);

    Route::apiResource('my_certificates', MyCertificateController::class)->names('my_certificate');
    Route::apiResource('my-branches', BranchController::class)->names('branch');
    Route::apiResource('verifications', VerificationApiController::class)->names('verification');
    // Route::get('verifications', [VerificationApiController::class, 'myVerification']);

    Route::get('available-posts', [AllpostsToApplayController::class, 'index']);
    Route::get('available-posts/{id}', [AllpostsToApplayController::class, 'show'])->middleware(RecordPostView::class);
    Route::post('bids', [BidsController::class, 'store'])->middleware(CheckFeatureLimit::class . ':bids');


    Route::get('allPacakge', [BackageFeatureController::class, 'index']);
    Route::post('subscribe', [SubscribeController::class, 'subscribe']);
    Route::get('package-usage', [PackageUsageController::class, 'currentUsage']);
});



Route::match(['GET', 'POST'], '/meta-webhook', function (Request $request) {

    $verifyToken = 'my_secret_token_123';

    Log::info('Meta Webhook Request', [
        'method'  => $request->method(),
        'url'     => $request->fullUrl(),
        'query'   => $request->query(),
        'body'    => $request->all(),
        'headers' => $request->headers->all(),
        'raw'     => $request->getContent(),
    ]);

    if ($request->isMethod('GET')) {

        $mode = $request->query->get('hub.mode');
        $token = $request->query->get('hub.verify_token');
        $challenge = $request->query->get('hub.challenge');

        Log::info('Meta Verify Request', [
            'mode' => $mode,
            'token' => $token,
            'challenge' => $challenge,
            'expected_token' => $verifyToken,
        ]);

        if ($mode === 'subscribe' && $token === $verifyToken) {

            Log::info('Meta Verify Success');

            return response($challenge, 200)
                ->header('Content-Type', 'text/plain');
        }

        Log::warning('Meta Verify Failed');

        return response()->json([
            'status' => 'forbidden',
            'mode' => $mode,
            'token' => $token,
            'expected' => $verifyToken,
        ], 403);
    }
    Log::info('Meta Event Received', [
        'payload' => $request->all(),
        'raw' => $request->getContent(),
    ]);

    return response()->json([
        'status' => 'received',
    ], 200);
});

require __DIR__ . '/admin.php';
