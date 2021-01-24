<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlyingSearchController extends Controller
{
    public function one_way_flying_from(Request $request){

        $api_url = 'https://test.api.amadeus.com/v1/reference-data/locations?subType=CITY,AIRPORT&keyword='.$request->address;

        $access_token = getAmadeusAccessToken();

        // return Http::asForm()->get($api_url, [
        //     'Bearer' => $access_token,
        // ]);
        $response = Http::withToken($access_token)->post($api_url);
            return $response;


    }
}
