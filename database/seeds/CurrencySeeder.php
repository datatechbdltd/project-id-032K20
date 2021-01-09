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
        $currency->status =   false;
        $currency->code =   'USD';
        $currency->name =   'DOLLAR';
        $currency->sign =   '$';
        $currency->save();
    }
}
