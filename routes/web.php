<?php

use Illuminate\Support\Facades\Route;

use App\Modules\TravelOrder\Controllers\TravelOrderController;
use App\Modules\User\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api/v1')->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('travel-orders', TravelOrderController::class);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
