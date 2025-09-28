<?php

use App\Http\Controllers\ApartmentController;
use Illuminate\Support\Facades\Route;

// Route::get('/apartments', [ApartmentController::class, 'index']);
// Route::get('/apartments/{id}', [ApartmentController::class, 'show']);
// Route::post('/apartments', [ApartmentController::class, 'store']);
// Route::put('/apartments/{id}', [ApartmentController::class, 'update']);
// Route::delete('/apartments/{id}', [ApartmentController::class, 'destroy']);

Route::apiResource('apartments', ApartmentController::class);

Route::get('apartments/search/{query}', [ApartmentController::class, 'searchApartments']);
