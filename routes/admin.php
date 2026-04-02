<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\UserInfo\UserInfoController;




use App\Http\Controllers\Admin\Ads\AdsController;


use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\Country\CountryController;

use App\Http\Controllers\Admin\Category\CategoryController;










use App\Http\Controllers\Admin\blog\blogController;




Route::prefix('v1/admin')->group(function () {});

Route::prefix('v1')->group(function () {
    Route::apiResource('categories', CategoryController::class)->names('category');

    
    Route::apiResource('countries', CountryController::class)->names('country');
    Route::apiResource('cities', CityController::class)->names('city');
    Route::apiResource('users', UserController::class)->names('user');
    
    
    Route::apiResource('ads', AdsController::class)->names('ads');
    
    
    
    
    Route::apiResource('user_infos', UserInfoController::class)->names('user_info');
    Route::apiResource('services', ServiceController::class)->names('service');
});
