<?php


use App\Http\Controllers\Admin\Ads\AdsController;

use App\Http\Controllers\Admin\Bag\BagController;



use App\Http\Controllers\Admin\BagItems\BagItemsController;
use App\Http\Controllers\Admin\BagsCategory\BagsCategoryController;
use App\Http\Controllers\Admin\Branch\BranchController;
use App\Http\Controllers\Admin\Category\CategoryController;

use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\Country\CountryController;
use App\Http\Controllers\Admin\Customer\CustomerController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Feature\FeatureController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Admin\Posts\PostsController;
use App\Http\Controllers\Admin\Provider\ProviderController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\UserInfo\UserInfoController;
use App\Http\Controllers\Admin\UserPacakges\UserPacakgesController;
use App\Http\Controllers\Admin\verification\verificationController;
use Illuminate\Support\Facades\Route;



Route::prefix('v1/admin')->group(function () {});

Route::prefix('admin/v1/')->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/stats',           [DashboardController::class, 'stats']);
        Route::get('/recent-bookings', [DashboardController::class, 'recentBookings']);
        Route::get('/weekly-revenue',  [DashboardController::class, 'weeklyRevenue']);
    });
    Route::apiResource('categories', CategoryController::class)->names('category');
    Route::apiResource('countries', CountryController::class)->names('country');
    Route::apiResource('cities', CityController::class)->names('city');
    Route::apiResource('user_infos', UserInfoController::class)->names('user_info');
    Route::apiResource('services', ServiceController::class)->names('service');
    Route::apiResource('postss', PostsController::class);
    Route::apiResource('packages', PackageController::class)->names('package');
    Route::apiResource('bags', BagController::class)->names('bag');
    Route::apiResource('bags_categories', BagsCategoryController::class)->names('bags_category');
    Route::apiResource('bag_items', BagItemsController::class)->names('bag_items');
    Route::apiResource('users', UserController::class)->names('user');
    Route::apiResource('provider', ProviderController::class)->names('provider');
    Route::apiResource('customer', CustomerController::class)->names('customer');
    Route::apiResource('features', FeatureController::class)->names('feature');
    Route::apiResource('user_pacakges', UserPacakgesController::class)->names('user_pacakges');
    Route::apiResource('ads', AdsController::class)->names('ads');
});

Route::prefix('v1')->group(function () {});
