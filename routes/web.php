<?php

use Illuminate\Support\Facades\Route;

use App\Modules\TravelOrder\Controllers\TravelOrderController;
use App\Modules\User\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


