<?php

namespace App\Http\Controllers\Provider;

use App\Flight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = Auth::user()->flights;
        return view('provider.flight.index', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.flight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'price' => 'required',
            'departing' => 'required',
            'returning' => 'required',
        ]);
        $flight = new Flight();
        $flight->provider_id = Auth::user()->id;
        $flight->from = $request->from;
        $flight->to = $request->to;
        $flight->price = $request->price;
        $flight->departing = $request->departing;
        $flight->returning = $request->returning;
        try {
            $flight->save();
            session()->flash('success', 'Flight create successfully');
            return redirect()->route('provider.flight.index');
        } catch (\Exception $exception) {
            session()->flash('error', 'Data create not found!!!');
            return redirect()->back();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        if ($flight->provider_id == Auth::user()->id)
            return view('provider.flight.edit', compact('flight'));
        else
            return back()->withErrors('Page not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'price' => 'required',
            'departing' => 'required',
            'returning' => 'required',
        ]);
        $flight->from = $request->from;
        $flight->to = $request->to;
        $flight->price = $request->price;
        $flight->departing = $request->departing;
        $flight->returning = $request->returning;
        try {
            $flight->save();
            session()->flash('success', 'Flight Update successfully');
            return redirect()->route('provider.flight.index');
        } catch (\Exception $exception) {
            session()->flash('error', 'Data Update not found!!!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        session()->flash('success', 'Flight delated successfully');
        return redirect()->back();
    }
}
