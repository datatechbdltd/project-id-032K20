@extends('administrative.layout.app')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ config('app.name') }}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="javascript:0;" class="text-muted">Applications</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('administrative.language.index') }}" class="text-muted">Languages</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript:0;" class="text-muted">Create</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin: Bootstrap table-->
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Add new language') }}
                        </h3>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('administrative.language.store') }}" method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group form-group-last">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                    <div class="alert-text">
                                        {{ __('Language adding note') }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ __('Name') }}</span></label>
                                        <input type="text" class="form-control form-control-solid" placeholder="English" name="language_name" value="{{ old('language_name') }}"/>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ __('Code') }}</span></label>
                                        <input type="text" class="form-control form-control-solid" placeholder="en" name="language_code" value="{{ old('language_code') }}"/>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ __('Flag') }}</span></label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Example input" name="language_flag_icon" value="{{ old('language_flag_icon') }}"/>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ __('Status') }}</span></label>
                                        <select name="language_status" class="form-control form-control-solid">
                                            <option value="{{ '1' }}" @if(old('language_status') == 1) selected @endif>Activated</option>
                                            <option value="{{ '0' }}" @if(old('language_status') == 0) selected @endif>Inactivated</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                           <div class="row">
                               @foreach($contents as $key => $value)
                                   <div class="col-4">
                                       <div class="form-group">
                                           <label><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{$key}}</span></label>
                                           <textarea class="form-control form-control-solid" rows="2"  name="word[{{$key}}]" >{{$value}}</textarea>
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end: Bootstrap table-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
@push('js')
    <!--begin::Page Scripts(used by this page)-->

    <!--end::Page Scripts-->
@endpush
