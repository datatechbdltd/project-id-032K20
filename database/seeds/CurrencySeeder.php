<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency = new \App\Currency();
        $currency->status =   true;
        $currency->code =   'BDT';
        $currency->name =   'TAKA';
        $currency->sign =   '৳';
        $currency->save();

        $currency = new \App\Currency();
        $currency->status =   true;
        $currency->code =   'USD';
        $currency->name =   'DOLLAR';
        $currency->sign =   '$';
        $currency->save();

        $currency = new \App\Currency();
        $currency->status =   true;
        $currency->code =   'UK';
        $currency->name =   'Pound';
        $currency->sign =   '£';
        $currency->save();

        $currency = new \App\Currency();
        $currency->status =   true;
        $currency->code =   'Yuan';
        $currency->name =   'Yuan';
        $currency->sign =   '€';
        $currency->save();

        $currency = new \App\Currency();
        $currency->status =   true;
        $currency->code =   'CAD';
        $currency->name =   'Ca dollar';
        $currency->sign =   'CA$';
        $currency->save();
    }
}
