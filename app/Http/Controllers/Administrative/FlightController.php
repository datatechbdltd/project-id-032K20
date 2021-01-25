<?php

namespace App\Http\Controllers\Administrative;

use App\Flight;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function provider_flight_index(){
        return view('administrative.provider-flight.index');
    }

    public function provider_flight_view($flight_id){
        $flight = Flight::findOrFail($flight_id);
        return view('administrative.provider-flight.view',compact('flight'));
    }

    public function provider_flight_approve($flight_id){
        $flight = Flight::find($flight_id);
        $flight->status = 'Approved';
        $flight->save();
        return redirect()->route('administrative.provider.flight.index')->withToastSuccess('Flight Approved Successfully!');
    }

    public function provider_flight_reject($flight_id){
        $flight = Flight::find($flight_id);
        $flight->status = 'Rejected';
        $flight->save();
        return redirect()->route('administrative.provider.flight.index')->withToastSuccess('Flight Rejected Successfully!');
    }
}
