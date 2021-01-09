<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->status       = 1;
        $user->name         = 'Mr. Admin';
        $user->email        = 'admin@gmail.com';
        $user->email_verified_at        = \Carbon\Carbon::now();
        $user->password     = \Illuminate\Support\Facades\Hash::make('password');
        $user->api_token    = Str::random(60);
        $user->save();

        $user = new \App\User();
        $user->status       = 1;
        $user->name         = 'Mr. Provider';
        $user->email        = 'provider@gmail.com';
        $user->email_verified_at        = \Carbon\Carbon::now();
        $user->password     = \Illuminate\Support\Facades\Hash::make('password');
        $user->api_token    = Str::random(60);
        $user->save();

        $user = new \App\User();
        $user->status       = 1;
        $user->name         = 'Mr. User';
        $user->email        = 'user@gmail.com';
        $user->email_verified_at        = \Carbon\Carbon::now();
        $user->password     = \Illuminate\Support\Facades\Hash::make('password');
        $user->api_token    = Str::random(60);
        $user->save();
    }
}
