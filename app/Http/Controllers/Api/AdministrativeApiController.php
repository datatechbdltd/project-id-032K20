<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdministrativeApiController extends Controller
{
    public function get_ajax_user(){
        $query = User::select('*');
        return datatables($query)->make(true);
    }

}
