<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class FlightSearchController extends Controller
{
    public function oneWayFlightSearchResult(Request $request){
        $request->validate([
            'flying_from' => 'required',
            'flying_to' => 'required|different:flying_from',
            'departing_date' => 'required',
        ]);

        $api_url = 'https://test.api.amadeus.com/v1/analytics/itinerary-price-metrics?originIataCode='.$request->flying_from_iata_code.'&destinationIataCode='.$request->flying_to_iata_code.'&departureDate='.$request->departing_date.'&currencyCode=CAD&oneWay=true';

        $access_token = getAmadeusAccessToken();
        $response = Http::withToken($access_token)->get($api_url);
        //$response = json_decode($response, true);
        return view('frontend.flight.one-way-search-result',compact('response'))->with('flying_from', $request->flying_from)->with('flying_to', $request->flying_to);;
    }
}
