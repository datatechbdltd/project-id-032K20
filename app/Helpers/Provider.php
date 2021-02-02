<?php

use App\User;
use App\Document;

if (!function_exists('random_code')){

   function get_auth_user_single_document($user_id, $document_type_id){
        $user_document = Document::where('user_id', $user_id)->where('document_type_id', $document_type_id)->orderBy('id', 'desc')->first();
        if ($user_document){
            return $user_document;
        }
        return false;
   }

   function check_provider_approval($provider_user_id){

   }

}




