<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class OpenWeatherMapServices
{
    private $key;

    public function __construct()
    {
        $this->key = config('app.open_weather_key');

        if (empty($this->key)) {
            throw new \Exception('Please add open weather api key first');
        }
    }

    public function get($city) {
        if (empty($city)) {
            return [];
        }

        $response = Http::get('api.openweathermap.org/data/2.5/forecast', [
            'q' => $city,
            'appid' => $this->key
        ]);

        if ($response->failed()) {
            return [];
        }

        return $response->json();
    }
}
