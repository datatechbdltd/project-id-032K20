<?php

namespace App\Http\Controllers\Administrative;

use App\Flight;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function providerFlightIndex(){
        return view('administrative.provider-flight.index');
    }

    public function providerFlightView($flight_id){
        $flight = Flight::findOrFail($flight_id);
        return view('administrative.provider-flight.view',compact('flight'));
    }

    public function providerFlightApprove($flight_id){
        $flight = Flight::find($flight_id);
        $flight->status = 'Approved';
        $flight->save();
        return redirect()->route('administrative.provider.flight.index')->withToastSuccess('Flight Approved Successfully!');
    }

    public function providerFlightReject($flight_id){
        $flight = Flight::find($flight_id);
        $flight->status = 'Rejected';
        $flight->save();
        return redirect()->route('administrative.provider.flight.index')->withToastSuccess('Flight Rejected Successfully!');
    }
}
