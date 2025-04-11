<?php

use App\Http\Controllers\PublicCarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cars/available', [PublicCarController::class, 'available'])->name('available');
