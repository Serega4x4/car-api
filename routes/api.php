<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;

Route::get('/cars/', [CarController::class, 'index'])->name('available');

Route::apiResource('options', OptionController::class);

Route::apiResource('configurations', ConfigurationController::class);

Route::apiResource('prices', PriceController::class);
