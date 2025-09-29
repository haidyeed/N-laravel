<?php

use App\Http\Controllers\ApartmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('apartments', ApartmentController::class);

Route::get('apartments/search/{query}', [ApartmentController::class, 'searchApartments']);
