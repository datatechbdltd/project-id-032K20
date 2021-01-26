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
        $user->type_id        = 1;
        $user->email_verified_at        = \Carbon\Carbon::now();
        $user->password     = \Illuminate\Support\Facades\Hash::make('password');
        $user->api_token    = Str::random(60);
        $user->save();

        $user = new \App\User();
        $user->status       = 1;
        $user->name         = 'Mr. Provider';
        $user->email        = 'provider@gmail.com';
        $user->type_id        = 2;
        $user->email_verified_at        = \Carbon\Carbon::now();
        $user->password     = \Illuminate\Support\Facades\Hash::make('password');
        $user->api_token    = Str::random(60);
        $user->save();

        $user = new \App\User();
        $user->status       = 1;
        $user->name         = 'Mr. Provider 2';
        $user->email        = 'provider2@gmail.com';
        $user->type_id        = 2;
        $user->email_verified_at        = \Carbon\Carbon::now();
        $user->password     = \Illuminate\Support\Facades\Hash::make('password');
        $user->api_token    = Str::random(60);
        $user->save();

        $user = new \App\User();
        $user->status       = 1;
        $user->name         = 'Mr. User';
        $user->email        = 'user@gmail.com';
        $user->type_id        = 3;
        $user->email_verified_at        = \Carbon\Carbon::now();
        $user->password     = \Illuminate\Support\Facades\Hash::make('password');
        $user->api_token    = Str::random(60);
        $user->save();

        for ($i=0; $i < 5; $i++) {
            $user = new \App\User();
            $user->status       = 1;
            $user->name         = 'Mr. User'.Str::random(3);
            $user->email        = Str::random(10).'@gmail.com';
            $user->type_id        = 3;
            $user->email_verified_at        = \Carbon\Carbon::now();
            $user->password     = \Illuminate\Support\Facades\Hash::make('password');
            $user->api_token    = Str::random(60);
            $user->save();
       }
    }
}
