<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/weather/{city}', [\App\Http\Controllers\Api\WeatherController::class, 'getWeather']);

Route::prefix('venue')->group(function() {
    Route::get('search/{city}', [\App\Http\Controllers\Api\VenueController::class, 'getVenue']);
    Route::get('category', [\App\Http\Controllers\Api\VenueController::class, 'getCategory']);
});

