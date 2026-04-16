<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BagItems\BagItemsController;
use App\Http\Controllers\Admin\BagsCategory\BagsCategoryController;
use App\Http\Controllers\Admin\Bag\BagController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Admin\Feature\FeatureController;

use App\Http\Controllers\Admin\Posts\PostsController;
use App\Http\Controllers\Admin\verification\verificationController;
use App\Http\Controllers\Admin\Branch\BranchController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Ads\AdsController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\UserInfo\UserInfoController;
use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\Country\CountryController;
use App\Http\Controllers\Admin\Category\CategoryController;




Route::prefix('v1/admin')->group(function () {});

Route::prefix('admin/v1/')->group(function () {
    Route::apiResource('categories', CategoryController::class)->names('category');
    Route::apiResource('countries', CountryController::class)->names('country');
    Route::apiResource('cities', CityController::class)->names('city');
    Route::apiResource('user_infos', UserInfoController::class)->names('user_info');
    Route::apiResource('services', ServiceController::class)->names('service');
    Route::apiResource('packages', PackageController::class)->names('package');
    Route::apiResource('bags', BagController::class)->names('bag');
    Route::apiResource('bags_categories', BagsCategoryController::class)->names('bags_category');
    Route::apiResource('bag_items', BagItemsController::class)->names('bag_items');
});

Route::prefix('v1')->group(function () {
    Route::apiResource('ads', AdsController::class)->names('ads');
    Route::apiResource('users', UserController::class)->names('user');
    Route::apiResource('features', FeatureController::class)->names('feature');
});
