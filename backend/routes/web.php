<?php

use App\Http\Controllers\ApartmentWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resources(['apartments' => ApartmentWebController::class]);
