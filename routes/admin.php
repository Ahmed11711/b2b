<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\UserController;









use App\Http\Controllers\Admin\blog\blogController;




Route::prefix('v1')->group(function () {    
    
    
    
    
    
    
    
    
    
    Route::apiResource('users', UserController::class)->names('user');
});
