<?php

use Illuminate\Support\Facades\Route;

// Modules
use App\Http\Controllers\API\AuthController;


Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'auth'], function() {
        Route::post('user-verify', [AuthController::class, 'userVerify'])->name('api.auth.user-verify');
    });
});
