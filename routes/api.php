<?php

use Illuminate\Support\Facades\Route;

/**
 * Modules
 */
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\ResidentFileRequestsController;
use App\Http\Controllers\API\ResidentRecordsController;


Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'auth'], function() {
        Route::post('login', [AuthController::class, 'userAuthenticate'])->name('api.auth.user-authenticate');
        Route::post('user-verify', [AuthController::class, 'userVerify'])->name('api.auth.user-verify');
    });

    Route::apiResource('resident-file-requests', ResidentFileRequestsController::class)->except('update');
    Route::apiResources([
        'users' => UsersController::class,
        'resident-records' => ResidentRecordsController::class,
    ]);
});
