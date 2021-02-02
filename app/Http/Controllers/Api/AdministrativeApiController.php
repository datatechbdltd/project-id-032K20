<?php

namespace App\Http\Controllers\Api;

use App\Flight;
use App\Http\Controllers\Controller;
use App\User;
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
                return '<a href="'. route('administrative.provider.edit', $data->id) .'" type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="'.$data->id.'"><i class="
                fas fa-eye icon-lg"></i></a><button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId"><i class="fas fa-trash-alt icon-lg"></i></button>';
            })
            ->addColumn('Avatar', function($data) {
                return '<img src="'.asset($data->avatar ?? get_static_option('no_image')).'" class="rounded" width="50px" height="50px">';
                //{{ asset(auth()->user()->avatar ?? get_static_option('no_image')) }}
            })
            ->addColumn('created_at', function($data) {
                return $data->created_at->format('D-d-M-Y');
            })
            ->rawColumns(['Actions','provider_name','Avatar'])
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
