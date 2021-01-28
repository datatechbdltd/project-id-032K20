<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class FlyingSearchController extends Controller
{
    public function airportSearch(Request $request){
        $api_url = 'https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT&keyword='.$request->address;
        $access_token = getAmadeusAccessToken();
        $response = Http::withToken($access_token)->get($api_url);
        return $response;
    }
}
