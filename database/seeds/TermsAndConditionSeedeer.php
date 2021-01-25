<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TermsAndConditionSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            $condition = new \App\TermsAndCondition();
            $condition->serial       = $i+1;
            $condition->title        = Str::random(20);
            $condition->description  = Str::random(30);
            $condition->save();
        }
    }
}
