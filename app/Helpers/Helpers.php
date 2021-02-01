<?php

use App\Currency;
use App\Language;
use App\StaticOption;
use App\DocumentTypesAndUserTypes;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

if (!function_exists('random_code')){

    function set_language($language_code)
    {
        if (Language::where('code', $language_code)->where('status', true)->exists()){
            Session::put('language', $language_code);
            App::setLocale(Session::get('language'));
            return true;
        }else{
            return false;
        }
    }

    function get_active_languages(){
        return Language::where('status', true)->get();
    }

    function get_current_language()
    {
        $locale = App::getLocale();
        return Language::where("code", $locale)->first();
    }

    function get_default_language()
    {
        return Language::where("is_default", true)->first();
    }

    function set_currency($currency_code)
    {
        if (Currency::where('code', $currency_code)->where('status', true)->exists()){
            Session::put('currency', $currency_code);
            return true;
        }else{
            return false;
        }
    }

    function get_active_currencies()
    {
        return Currency::where('status', true)->get();
    }

    function get_current_currency()
    {
        return Session::get('currency');
    }



    /**
     * @param $table
     * @param $column
     * @return mixed
     *
     */
    function get_content_by_language($table){
        if ( get_current_language()->$table ){
            return get_current_language()->$table;
        }else{
            return get_default_language()->$table;
        }
    }

    function get_rate_of_currency_by_code($currency_core){
        $current_currency_data =  Http::get('https://openexchangerates.org/api/latest.json', [
            'app_id' => '6f3c784068814d8ab27caa3e4f20425c'
        ]);
        $rate = json_decode($current_currency_data, true)['rates']["$currency_core"];
        if ($rate){
            return $rate;
        }else{
            return false;
        }
    }

    //Generate access token and return
    function getAmadeusAccessToken(){
        $url = "https://test.api.amadeus.com/v1/security/oauth2/token";
        $response = Http::asForm()->post($url, [
            'grant_type' => 'client_credentials',
            'client_id' => 'pcnrYMNBPbZ2rVlUXES8j3AiAo1YEpiB',
            'client_secret' => 'qHe8Gbl2Z5Twzlkp'
        ]);
        return $response['access_token'];
        //{ "type": "amadeusOAuth2Token", "username": "m.sakirahmed@gmail.com", "application_name": "032K20",
        // "client_id": "pcnrYMNBPbZ2rVlUXES8j3AiAo1YEpiB", "token_type": "Bearer", "access_token": "oTWaTkNdh5xAcvx0VJAypLJ1ZqBC",
        // "expires_in": 1799, "state": "approved", "scope": "" }
    }

    function getAmadeusAccessTokenView(){
        $url = "https://test.api.amadeus.com/v1/security/oauth2/token";
        $response = Http::asForm()->post($url, [
            'grant_type' => 'client_credentials',
            'client_id' => 'pcnrYMNBPbZ2rVlUXES8j3AiAo1YEpiB',
            'client_secret' => 'qHe8Gbl2Z5Twzlkp'
        ]);
        echo($response['access_token']) ;
        //{ "type": "amadeusOAuth2Token", "username": "m.sakirahmed@gmail.com", "application_name": "032K20",
        // "client_id": "pcnrYMNBPbZ2rVlUXES8j3AiAo1YEpiB", "token_type": "Bearer", "access_token": "oTWaTkNdh5xAcvx0VJAypLJ1ZqBC",
        // "expires_in": 1799, "state": "approved", "scope": "" }
    }

    function sendSmtpTest($to)
    {

        $subject= 'SMTP Test';
        $message= 'SMTP working fine';
        $name = get_static_option('smtp_email_from_name');
        $from = get_static_option('smtp_email_from_email');
        $headers = "From: " . $name . " \r\n";
        $headers .= "Reply-To: <$from> \r\n";
        $headers .= "Return-Path: " . ($from) . "\r\n";;
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Priority: 2\nX-MSmail-Priority: high";;
        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            return true;
        }else{
            return false;
        }

    }

    function setEnvValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }

    function set_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function get_static_option($key)
    {
        if (StaticOption::where('option_name', $key)->first()) {
            $return_val = StaticOption::where('option_name', $key)->first();
            return $return_val->option_value;
        }
        return null;
    }

    function get_document_type_and_user_type($user_type_id,$document_type_id)
    {
        if(DocumentTypesAndUserTypes::where('user_type_id',$user_type_id)->where('document_type_id',$document_type_id)->exists()){
            return true;
        }else{
            return false;
        }
    }

    function update_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        } else {
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function delete_static_option($key)
    {
        StaticOption::where('option_name', $key)->delete();
        return true;
    }
}
