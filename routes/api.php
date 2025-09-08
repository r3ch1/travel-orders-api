<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\TravelOrder\Controllers\TravelOrderController;
use App\Modules\User\Controllers\AuthController;

Route::prefix('v1')->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('travel-orders', TravelOrderController::class)->except(['update']);
        Route::middleware('profile:admin')->put('travel-orders/{travel_order}', [TravelOrderController::class, 'update']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
