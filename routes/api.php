<?php

use Illuminate\Support\Facades\Route;

/**
 * Modules
 */
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\ResidentCertificatesController;
use App\Http\Controllers\API\ResidentRecordsController;
use App\Http\Controllers\API\ComplaintRecordsController;


Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'auth'], function() {
        Route::post('login', [AuthController::class, 'userAuthenticate'])->name('api.auth.user-authenticate');
        Route::post('user-verify', [AuthController::class, 'userVerify'])->name('api.auth.user-verify');
    });

    Route::apiResources([
        'users' => UsersController::class,
        'resident-records' => ResidentRecordsController::class,
        'resident-certificates' => ResidentCertificatesController::class,
        'complaint-records' => ComplaintRecordsController::class,
    ]);
});
