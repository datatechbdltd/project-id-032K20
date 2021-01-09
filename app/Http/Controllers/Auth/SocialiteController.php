<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * socialite login socialiteLogin
     */
    public function redirectToProvider($driver){
        //send user's request to social media
        return Socialite::driver($driver)->redirect();
    }

    /**
     * socialite Github Call Back
     */
    public function handleProviderCallback($driver){
        try {
            $getInfo = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        $user = $this->createOrGetUser($getInfo);
        auth()->login($user, true);
        return redirect()->route('home');
    }

    function createOrGetUser($getInfo){
        $user = User::where('email', $getInfo->email)->first();
        if(!$user){
            // create a new user
            $user               = new User;
            $user->email        =   $getInfo->email;
            $user->name         =   $getInfo->name;
            $user->avatar       =   $getInfo->avatar;
            $user->password     =   Hash::make(Str::random(24));
            $user->api_token    =   Str::random(60);
            $user->save();
        }
        return $user;
    }

}
