<?php

use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flight = new \App\Flight();
        $flight->provider_id = 2 ;
        $flight->from = 'Bangladesh';
        $flight->to = 'India';
        $flight->price = '45000';
        $flight->departing = '1997-11-26';
        $flight->returning = '1998-11-26';
        $flight->status = 'pending';
        $flight->save();

        $flight = new \App\Flight();
        $flight->provider_id = 2 ;
        $flight->from = 'Bangladesh';
        $flight->to = 'India';
        $flight->price = '45000';
        $flight->departing = '1997-11-26';
        $flight->returning = '1998-11-26';
        $flight->status = 'pending';
        $flight->save();

        $flight = new \App\Flight();
        $flight->provider_id = 2 ;
        $flight->from = 'Bangladesh';
        $flight->to = 'India';
        $flight->price = '45000';
        $flight->departing = '1997-11-26';
        $flight->returning = '1998-11-26';
        $flight->status = 'pending';
        $flight->save();

        $flight = new \App\Flight();
        $flight->provider_id = 2 ;
        $flight->from = 'Bangladesh';
        $flight->to = 'India';
        $flight->price = '45000';
        $flight->departing = '1997-11-26';
        $flight->returning = '1998-11-26';
        $flight->status = 'pending';
        $flight->save();

        $flight = new \App\Flight();
        $flight->provider_id = 2 ;
        $flight->from = 'Bangladesh';
        $flight->to = 'India';
        $flight->price = '45000';
        $flight->departing = '1997-11-26';
        $flight->returning = '1998-11-26';
        $flight->status = 'pending';
        $flight->save();

        $flight = new \App\Flight();
        $flight->provider_id = 1 ;
        $flight->from = 'Bangladesh';
        $flight->to = 'India';
        $flight->price = '45000';
        $flight->departing = '1997-11-26';
        $flight->returning = '1998-11-26';
        $flight->status = 'pending';
        $flight->save();
    }
}
