<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class FourSquareServices
{
    private $fourSqToken;

    public function __construct()
    {
        $this->fourSqToken = config('app.four_sq_token');

        if (empty($this->fourSqToken)) {
            throw new \Exception('Please add four square token first');
        }
    }

    public function getVenue($city) {
        if (empty($city)) {
            return [];
        }

        $response = Http::accept('application/json')
            ->get('api.foursquare.com/v2/venues/search', [
                'oauth_token' => $this->fourSqToken,
                'near' => $city,
                'limit' => 5,
                'categoryId' => '4deefb944765f83613cdba6e',
                'v' => date('Ymd')
            ]);

        if ($response->failed()) {
            return $response->json();
            return [];
        }

        return $response->json();
    }

    public function getCategory() {
        $response = Http::accept('application/json')
            ->get('api.foursquare.com/v2/venues/categories', [
                'oauth_token' => $this->fourSqToken,
                'v' => date('Ymd')
            ]);

        if ($response->failed()) {
            return $response->json();
            return [];
        }

        return $response->json();
    }
}
