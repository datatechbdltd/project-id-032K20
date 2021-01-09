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
                                <a href="javascript:0;" class="text-muted">Show</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Shift language</a>
                    <!--end::Actions-->
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-success svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-header font-weight-bold py-4">
                                    <span class="font-size-lg">Choose language:</span>
                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="navi-separator mb-3 opacity-70"></li>
                                @foreach(all_languages() as $all_language)
                                <li class="navi-item">
                                    <a href="{{ route('administrative.language.show', $all_language->id) }}" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-success">{{ $all_language->name }}</span>
														</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--end::Toolbar-->
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
                            {{ __('Show') }} &nbsp; <b>{{ $language->name }}</b>
                        </h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form" id="read-only-form">
                        <div class="card-body">
                            <div class="form-group form-group-last">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                    <div class="alert-text">
                                        @include('includes.alert')
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ __('Name') }}</span></label>
                                        <input type="text" class="form-control form-control-solid" placeholder="English" name="language_name" value="{{ $language->name }}"/>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ __('Code') }}</span></label>
                                        <input type="text" class="form-control form-control-solid" placeholder="en" name="language_code" value="{{ $language->code }}"/>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ __('Flag') }}</span></label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Example input" name="language_flag_icon" value="{{ $language->flag }}"/>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ __('Status') }}</span></label>
                                        <select name="language_status" class="form-control form-control-solid">
                                            <option value="{{ '1' }}" @if($language->status == 1) selected @endif>Activated</option>
                                            <option value="{{ '0' }}" @if($language->status == 0) selected @endif>Inactivated</option>
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
    <script>
        $(document).ready(function() {
            $("#read-only-form :input").prop("disabled", true);
        });
    </script>
    <!--end::Page Scripts-->
@endpush

