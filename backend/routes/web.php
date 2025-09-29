<?php

use App\Http\Controllers\ApartmentWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



//Dashboard routes

Route::group(['prefix' => 'dashboard','as' => 'dashboard.'], function () {
    
    Route::resources(['apartments' => ApartmentWebController::class]);
    
});