<?php

use Illuminate\Support\Facades\Route;

use App\Modules\TravelOrder\Controllers\TravelOrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api/v1')->group(function(){
    Route::resource('travel-orders', TravelOrderController::class)->except(['create', 'edit']);
});
