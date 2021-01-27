<?php

namespace App\Http\Controllers\Global;

use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HelperController extends Controller
{
    public function languageSwitcher($languageCode){
        if (Language::where('code', $languageCode)->where('status', true)->exists()){
            Session::put('language', $languageCode);
            App::setLocale(Session::get('language'));
            return redirect()->back();
        }else{
            echo 'Not available';
        }
    }

    public function currencySwitcher($currencyCode){
        if (Currency::where('code', $currencyCode)->where('status', true)->exists()){
            Session::put('currency', $currencyCode);
            return redirect()->back();
        }else{
            echo 'Not available';
        }
    }
}
