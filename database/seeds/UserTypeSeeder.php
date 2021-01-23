<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\UserType();
        $user->name         = 'admin';
        $user->save();

        $user = new \App\UserType();
        $user->name         = 'provider';
        $user->save();

        $user = new \App\UserType();
        $user->name         = 'customer';
        $user->save();
    }
}
