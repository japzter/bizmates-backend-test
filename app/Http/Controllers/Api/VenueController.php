<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FourSquareServices;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function getVenue($city)
    {
        $fourSq = new FourSquareServices();

        return $fourSq->getVenue($city);
    }

    public function getCategory()
    {
        $fourSq = new FourSquareServices();

        return $fourSq->getCategory();
    }
}
