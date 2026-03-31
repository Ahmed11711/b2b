<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\blog\blogController;
use App\Http\Controllers\Admin\blogs\blogsController;
use App\Http\Controllers\Admin\User\UserController;


Route::prefix('v1')->group(function () {    Route::apiResource('users', UserController::class)->names('user');
    Route::apiResource('blogs', blogController::class)->names('blog');
    Route::apiResource('blogs', blogsController::class)->names('blogs');
});
