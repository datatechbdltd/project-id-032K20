@extends('administrative.layout.app')
@push('title') {{ __('SEO Setup') }} @endpush
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
                                <a href="javascript:0;" class="text-muted">SEO</a>
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
                                    SEO
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-8">
                                    <div class="alert alert-custom alert-default" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                        <div class="alert-text">
                                            Note about application seo
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form-->
                                <div class="accordion accordion-solid accordion-toggle-plus" id="">
                                    @foreach(all_languages() as $language)
                                        <div class="card seo-section">
                                            <div class="card-header " id="">
                                                <div class="card-title collapsed" data-toggle="collapse" data-target="#seo-body-{{ $language->id }}">
                                                    <i class="flaticon2-notification"></i> {{ $language->name }}
                                                </div>
                                            </div>
                                            <div id="seo-body-{{ $language->id }}" class="collapse">
                                                <!--begin::Form-->
                                                <form action="{{ route('administrative.setting.seo.update') }}" method="post" class="form">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Author</label>
                                                            <input type="text" name="author" required class="form-control form-control-solid" placeholder="Author" value="{{ $language->application_seo['author'] }}"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="description" required class="form-control form-control-solid" rows="3" placeholder="Meta description">{{ $language->application_seo['description'] }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Keywords</label>
                                                            <input type="text" name="keyword" required class="form-control form-control-solid" placeholder="Tag1, Tag2. Tag3 ..."  value="{{ $language->application_seo['keyword'] }}"/>
                                                        </div>
                                                        {{--<div class="form-group">
                                                            <label>Tags</label>
                                                            <input id="kt_tagify_1" class="form-control tagify tag-input-field" name='tags' placeholder='type...' value='css, html, javascript' autofocus="" data-blacklist='.NET,PHP' />
                                                            <div class="mt-3">
                                                                <a href="javascript:;" id="kt_tagify_1_remove" class="btn btn-sm btn-light-primary font-weight-bold tagify-clear">Remove tags</a>
                                                            </div>
                                                        </div>--}}
                                                        <input type="hidden" name="language_code" value="{{ $language->code }}">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
    <!--begin::Page Scripts(used by this page)-->
   <script src="{{ asset('assets/administrative/js/pages/crud/forms/widgets/tagify.js') }}"></script>
    <!--end::Page Scripts-->
@endpush
