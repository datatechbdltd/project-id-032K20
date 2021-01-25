@extends('administrative.layout.app')
@push('title') {{ __('Provider\'s flight view') }} @endpush
@push('css')

@endpush
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Providers flight view</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted"></a>
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
                <!--begin::Profile 2-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <!--begin::Body-->
                            <div class="card-body pt-15">
                                <!--begin::User-->
                                <div class="text-center mb-10">
                                    <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                        <div class="symbol-label"
                                        style="background-image: url(@if($flight->provider->avatar) {{ asset($flight->provider->avatar) }} @else {{ asset('assets/uploads/images/no-image.png') }} @endif"></div>
                                        <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                                    </div>
                                    <h4 class="font-weight-bold my-2">{{ $flight->provider->name }}</h4>
                                    <div class="text-muted mb-2">{{ $flight->provider->email }}</div>
                                    @if($flight->provider->phone)
                                        <span class="label label-light-warning label-inline font-weight-bold label-lg">{{ $flight->provider->phone }}</span>
                                    @endif
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid ml-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::Mixed Widget 5-->
                                <div class="card card-custom bg-radial-gradient-primary card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title font-weight-bolder text-white">Flight Details</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column p-0">
                                        <!--begin::Chart-->
                                        <div id="kt_mixed_widget_5_chart" style="height: 200px"></div>
                                        <!--end::Chart-->
                                        <!--begin::Stats-->
                                        <div class="card-spacer bg-white card-rounded flex-grow-1">
                                            <!--begin::Row-->
                                            <div class="row m-0">
                                                <div class="col px-8 py-6 mr-8">
                                                    <div class="font-size-sm text-muted font-weight-bold">From :</div>
                                                    <div class="font-size-h4 font-weight-bolder">{{ $flight->from }}</div>
                                                </div>
                                                <div class="col px-8 py-6">
                                                    <div class="font-size-sm text-muted font-weight-bold">To :</div>
                                                    <div class="font-size-h4 font-weight-bolder">{{ $flight->to }}</div>
                                                </div>
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                            <div class="row m-0">
                                                <div class="col px-8 py-6 mr-8">
                                                    <div class="font-size-sm text-muted font-weight-bold">Departing :</div>
                                                    <div class="font-size-h4 font-weight-bolder">{{ $flight->departing }}</div>
                                                </div>
                                                <div class="col px-8 py-6">
                                                    <div class="font-size-sm text-muted font-weight-bold">Returning :</div>
                                                    <div class="font-size-h4 font-weight-bolder">{{ $flight->returning }}</div>
                                                </div>
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                            <div class="row m-0">
                                                <div class="col px-8 py-6 mr-8">
                                                    <div class="font-size-sm text-muted font-weight-bold">Status :</div>
                                                    <div class="font-size-h4 font-weight-bolder">{{ $flight->status }}</div>
                                                </div>
                                                <div class="col px-8 py-6">
                                                    <div class="font-size-sm text-muted font-weight-bold">Verified by :</div>
                                                    <div class="font-size-h4 font-weight-bolder">{{ $flight->administrative->name ?? 'Nobody' }}</div>
                                                </div>
                                            </div>
                                            <!--end::Row-->
                                            <div class="card-footer border-0 py-5">
                                                <div class="card-toolbar">
                                                    <button href="javascript:0" class="btn btn-info font-weight-bolder font-size-sm approve" value="{{ route('administrative.provider.flight.approve',$flight->id) }}" >Approve</button>
                                                    <button href="#" class="btn btn-danger
                                                     font-weight-bolder font-size-sm reject"
                                                     value="{{ route('administrative.provider.flight.reject',$flight->id) }}">Reject</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 5-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Profile 2-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
@push('js')
  <script>
    $( ".approve" ).click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
            location.replace($(this).val())
            }
        })
    })
    $( ".reject" ).click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reject it!'
        }).then((result) => {
            if (result.isConfirmed) {
            location.replace($(this).val())
            }
        })
    })
    </script>
@endpush
