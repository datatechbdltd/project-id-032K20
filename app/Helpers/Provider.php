<?php

use App\User;

if (!function_exists('random_code')){
    function check_provider_approval($provider_id){
        if (User::find($provider_id)->provider){
            if (User::find($provider_id)->provider->is_approved == true){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}




