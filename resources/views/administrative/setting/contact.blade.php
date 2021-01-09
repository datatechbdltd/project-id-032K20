@extends('administrative.layout.app')
@push('title') {{ __('Contact Setup') }} @endpush
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
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
                                <a href="javascript:0;" class="text-muted">Setting</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript:0;" class="text-muted">Contact</a>
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
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <!--begin::Status btn-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Contact
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-8">
                                    <div class="alert alert-custom alert-default" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                        <div class="alert-text">
                                            Note about contact setting
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('administrative.setting.contact.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{--Email section--}}
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" required class="form-control"  placeholder="mail@domain.com" value="{{ get_static_option('company_main_email') }}"/>
                                    </div>
                                    {{--Phone section--}}
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" required class="form-control"  placeholder="+123 456 789" value="{{ get_static_option('company_main_phone') }}"/>
                                    </div>
                                    {{--Footer section--}}
                                    <div class="form-group">
                                        <label>Footer credit <span class="text-danger">*</span></label>
                                        <textarea name="footer_credit" id="footer_credit" cols="30" rows="10">
                                            {!! get_static_option('website_footer_credit') !!}
                                        </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                        <!--end::Status btn-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#footer_credit').summernote({
                placeholder: 'Write footer credit',
                tabsize: 10,
                height: 70,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                ]
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endpush
