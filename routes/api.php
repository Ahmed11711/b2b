<?php

use App\Http\Controllers\Admin\Branch\BranchController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\MyCertificate\MyCertificateController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\verification\verificationController;
use App\Http\Controllers\Api\MyCategory\MyCategoryController;
use App\Http\Controllers\Api\Profile\ProfileAccountController;
use App\Http\Controllers\Api\Service\ServiceApiController;
use App\Http\Controllers\Api\Service\ServiceController;
use App\Http\Controllers\Api\UserContact\UserContactController;
use App\Http\Controllers\Auth\CreateAcountController;
use App\Http\Controllers\Auth\LoginAccountController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Middleware\CheckJwtToken;
use Illuminate\Support\Facades\Route;











Route::group(['prefix' => 'v1/auth'], function () {

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
    Route::resource('services', ServiceApiController::class)
        ->except(['store', 'update', 'destroy']);
});


// provider
Route::middleware(CheckJwtToken::class)->prefix('v1/provider')->group(function () {
    Route::get('my-category', [MyCategoryController::class, 'index']);
    Route::post('my-category', [MyCategoryController::class, 'store']);
    Route::resource('my-service', ServiceApiController::class);
    Route::put('my-socialMedia', [UserContactController::class, 'upsert']);
    Route::get('my-socialMedia', [UserContactController::class, 'index']);
    Route::get('city', [CityController::class, 'index']);
    Route::put('my-profile', [ProfileAccountController::class, 'update']);
    Route::get('my-profile', [ProfileAccountController::class, 'show']);
    Route::apiResource('my-projects', ProjectController::class)->names('project');
    Route::apiResource('my_certificates', MyCertificateController::class)->names('my_certificate');
    Route::apiResource('my-branches', BranchController::class)->names('branch');
    Route::apiResource('verifications', verificationController::class)->names('verification');
});

require __DIR__ . '/admin.php';
