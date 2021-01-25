<?php

namespace App\Http\Controllers\Api;

use App\Flight;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class AdministrativeApiController extends Controller
{
    public function get_ajax_user(){
        $query = User::select('*');
        return datatables($query)->make(true);
    }
    public function get_ajax_provider(){
        $data =User::role('provider')->get();
        return DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" data-id="'.$data->id.'" class="btn btn-danger btn-sm" ><i class="fas fa-trash-alt icon-lg"></i></button><button type="button" data-id="'.$data->id.'" class="btn btn-primary btn-sm"><i class="fas fa-edit icon-lg"></i></button>';
            })

            ->rawColumns(['Actions','provider_name'])
            ->make(true);
    }

    public function get_ajax_provider_flight(){
        $data =Flight::all();
        return DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<a href="'. route('administrative.provider.flight.view', $data->id) .'" type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="'.$data->id.'"><i class="
                fas fa-eye icon-lg"></i></a><button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId"><i class="fas fa-trash-alt icon-lg"></i></button>';
            })
            ->addColumn('provider_name', function($data) {
                return $data->provider->name;
            })
            ->rawColumns(['Actions','provider_name'])
            ->make(true);
    }



}
