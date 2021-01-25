<?php

use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriber = new \App\Subscriber();
        $subscriber->phone         = '7414619619864';
        $subscriber->email        = 'admin@gmail.com';
        $subscriber->save();

        $subscriber = new \App\Subscriber();
        $subscriber->phone         = '85128518725218';
        $subscriber->email        = 'user@gmail.com';
        $subscriber->save();
    }
}
