<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function languageSwitcher($languageCode){
        if (set_language($languageCode)){
            return back()->withToastSuccess('Language changed to '.$languageCode);
        }else{
            return back()->withErrors('Language dos\'t changed');
        }
    }

    public function currencySwitcher($currencyCode){
        if (set_currency($currencyCode)){
            return back()->withToastSuccess('Currency changed to '.$currencyCode);
        }else{
            return back()->withErrors('Currency dos\'t changed');
        }
    }
}
