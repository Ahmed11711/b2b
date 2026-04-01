<?php

use App\Http\Controllers\Auth\CreateAcountController;
use App\Http\Controllers\Auth\LoginAccountController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Middleware\CheckJwtToken;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'auth'], function () {

    // Public Routes
    Route::post('register', [CreateAcountController::class, 'register']);
    Route::post('login', [LoginAccountController::class, 'login']);
    Route::post('social-login', [LoginAccountController::class, 'socialLogin']);

    Route::group(['middleware' => CheckJwtToken::class], function () {
        Route::get('me', [ProfileController::class, 'me']);
        Route::post('refresh', [LoginAccountController::class, 'refresh']);
        Route::post('logout', [ProfileController::class, 'logout']);
    });
});

require __DIR__ . '/admin.php';
