<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;



class LanguageController extends Controller
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
}
