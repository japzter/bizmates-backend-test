<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OpenWeatherMapServices;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getWeather($city) {
        $openWeather = new OpenWeatherMapServices;

        return $openWeather->get($city);
    }
}
