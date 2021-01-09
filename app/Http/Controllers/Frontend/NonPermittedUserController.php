<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NonPermittedUserController extends Controller
{
    public function index(){
        return view('frontend.non-permitted');
    }

    public function assignPermission($permission){
        if ($permission == 'user'){
            Auth::user()->assignRole('user');
        }elseif ($permission == 'provider'){
            Auth::user()->assignRole('provider');
        }
        return redirect()->route('home');
    }
}
