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

    public function oneWayFlightSearch(Request $request){
        $request->validate([
            'flying_from' => 'required',
            'flying_to' => 'required|different:flying_from',
            'departing_date' => 'required',
        ]);

        $api_url = 'https://test.api.amadeus.com/v1/analytics/itinerary-price-metrics?originIataCode='.$request->flying_from_iata_code.'&destinationIataCode='.$request->flying_to_iata_code.'&departureDate='.$request->departing_date.'&currencyCode=CAD&oneWay=true';

        $access_token = getAmadeusAccessToken();
        $response = Http::withToken($access_token)->get($api_url);
        //$response = json_decode($response);
        // return redirect()->route('frontend.oneWayFlightSearchResult', $response);
        return view('frontend.flight.one-way-search-result',compact('response'));
    }
}
