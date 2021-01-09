<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'status' => '1',
            'name' => 'English',
            'code' => 'en',
            'flag' => 'en.pmg',
            'alignment' => 'ltr',
        ]);

        DB::table('languages')->insert([
            'status' => '1',
            'name' => 'বাংলা',
            'code' => 'bn',
            'flag' => 'bd.pmg',
            'alignment' => 'ltr',
        ]);

        DB::table('languages')->insert([
            'status' => '1',
            'name' => 'Hindi',
            'code' => 'hin',
            'flag' => 'hin.png',
            'alignment' => 'ltr',
        ]);

        DB::table('languages')->insert([
            'status' => '1',
            'name' => 'Arabic',
            'code' => 'ar',
            'flag' => 'ar.png',
            'alignment' => 'rtl',
        ]);
    }
}
