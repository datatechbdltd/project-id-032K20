@extends('administrative.layout.app')
@push('title') {{ __('Identity Setup') }} @endpush
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
                                <a href="javascript:0;" class="text-muted">Identity</a>
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
                    <div class="col-xl-6 col-md-6">
                        <!--begin::Status btn-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Image
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form>
                                <div class="card-body">
                                    <div class="form-group mb-8">
                                        <div class="alert alert-custom alert-default" role="alert">
                                            <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                            <div class="alert-text">
                                                Permission notes
                                            </div>
                                        </div>
                                    </div>
                                   {{--Website Logo--}}
                                    <div class="form-group row bg-light-success rounded ">
                                         <div class="col-6 text-right">
                                            <label for="example-search-input" class="col-form-label "><b>Website logo (134px, 38px)</b></label>
                                        </div>
                                        <div class="col-6">
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded bg-light-success text-center">
                                                    <img @if(get_static_option('website_logo'))  src="{{ asset(get_static_option('website_logo')) }}" @else src="{{ asset('assets/administrative/media/products/1.png') }}" @endif alt="" id="image-display" class="mw-100 w-200px image-display">
                                                </div>
                                                <div class="overlay-layer">
                                                    <input style="display: none" type="file" accept="image/*" class="image-importer">
                                                    <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                                        <i class="ki ki-plus text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn" @if(get_static_option('website_logo'))  value="{{ asset(get_static_option('website_logo')) }}" @else value="{{ asset('assets/administrative/media/products/1.png') }}" @endif>
                                                        <i class="ki ki-reload text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-info mr-2 submit-btn" value="website_logo">
                                                        <i class="ki ki-bold-check text-white"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--Favicon--}}
                                    <div class="form-group row bg-light-success rounded ">
                                         <div class="col-6 text-right">
                                            <label for="example-search-input" class="col-form-label "><b>Favicon (16px, 16px)</b></label>
                                        </div>
                                        <div class="col-6">
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded bg-light-success text-center">
                                                    <img @if(get_static_option('favicon'))  src="{{ asset(get_static_option('favicon')) }}" @else src="{{ asset('assets/administrative/media/products/1.png') }}" @endif alt="" id="image-display" class="mw-100 w-200px image-display">
                                                </div>
                                                <div class="overlay-layer">
                                                    <input style="display: none" type="file" accept="image/*" class="image-importer">
                                                    <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                                        <i class="ki ki-plus text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn" @if(get_static_option('favicon'))  value="{{ asset(get_static_option('favicon')) }}" @else value="{{ asset('assets/administrative/media/products/1.png') }}" @endif>
                                                        <i class="ki ki-reload text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-info mr-2 submit-btn" value="favicon">
                                                        <i class="ki ki-bold-check text-white"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--Breadcrumb--}}
                                    <div class="form-group row bg-light-success rounded ">
                                        <div class="col-6 text-right">
                                            <label for="example-search-input" class="col-form-label "><b>Breadcrumb Image</b></label>
                                            <br>
                                        </div>
                                        <div class="col-6">
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded bg-light-success text-center">
                                                    <img src="{{ asset('assets/administrative/media/products/1.png') }}" alt="" id="image-display" class="mw-100 w-200px image-display">
                                                </div>
                                                <div class="overlay-layer">
                                                    <input style="display: none" type="file" accept="image/*" class="image-importer">
                                                    <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                                        <i class="ki ki-plus text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn" value="{{ asset('assets/administrative/media/products/1.png') }}">
                                                        <i class="ki ki-reload text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-info mr-2">
                                                        <i class="ki ki-bold-check text-white"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--We Accept--}}
                                    <div class="form-group row bg-light-success rounded ">
                                        <div class="col-6 text-right">
                                            <label for="example-search-input" class="col-form-label "><b>We accept (100px, 21px)</b></label>
                                        </div>
                                        <div class="col-6">
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded bg-light-success text-center">
                                                    <img @if(get_static_option('we_accept'))  src="{{ asset(get_static_option('we_accept')) }}" @else src="{{ asset('assets/administrative/media/products/1.png') }}" @endif alt="" id="image-display" class="mw-100 w-200px image-display">
                                                </div>
                                                <div class="overlay-layer">
                                                    <input style="display: none" type="file" accept="image/*" class="image-importer">
                                                    <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                                        <i class="ki ki-plus text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn" @if(get_static_option('we_accept'))  value="{{ asset(get_static_option('we_accept')) }}" @else value="{{ asset('assets/administrative/media/products/1.png') }}" @endif>
                                                        <i class="ki ki-reload text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-info mr-2 submit-btn" value="we_accept">
                                                        <i class="ki ki-bold-check text-white"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--Meta image--}}
                                    <div class="form-group row bg-light-success rounded ">
                                        <div class="col-6 text-right">
                                            <label for="example-search-input" class="col-form-label "><b>Meta image (1200px, 627 px)</b></label>
                                        </div>
                                        <div class="col-6">
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded bg-light-success text-center">
                                                    <img @if(get_static_option('meta_image'))  src="{{ asset(get_static_option('meta_image')) }}" @else src="{{ asset('assets/administrative/media/products/1.png') }}" @endif alt="" id="image-display" class="mw-100 w-200px image-display">
                                                </div>
                                                <div class="overlay-layer">
                                                    <input style="display: none" type="file" accept="image/*" class="image-importer">
                                                    <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                                        <i class="ki ki-plus text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn" @if(get_static_option('meta_image'))  value="{{ asset(get_static_option('meta_image')) }}" @else value="{{ asset('assets/administrative/media/products/1.png') }}" @endif>
                                                        <i class="ki ki-reload text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-info mr-2 submit-btn" value="meta_image">
                                                        <i class="ki ki-bold-check text-white"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Status btn-->
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <!--begin::Form-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Color
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                <div class="form-group mb-8">
                                    <div class="alert alert-custom alert-default" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                        <div class="alert-text">
                                            Note about color setup..
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('administrative.setting.identity_color.update') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="hero-bg-color" class="col-2 col-form-label">Hero bg</label>
                                        <div class="col-10">
                                            <input class="form-control" type="color" name="hero_bg" value="{{ get_static_option('website_hero_bg_color') }}" id="hero-bg-color"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                        <div class="col-10">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                        <div class="col-10">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                        <div class="col-10">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                        <div class="col-10">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                        <div class="col-10">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                        <div class="col-10">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                        <div class="col-10">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label"></label>
                                        <div class="col-10">
                                            <button type="submit" class="btn btn-primary mr-2">Submit colors</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Form-->
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
            //Submit image without reload
            $('.submit-btn').click(function(){
                var formData = new FormData();
                formData.append('type', $(this).val())
                formData.append($(this).val(), $(this).parent().parent().find('.image-importer')[0].files[0])
                var this_button = $(this);
                $.ajax({
                    method: 'POST',
                    url: "{{ route('administrative.setting.identity_image.update') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        this_button.prop("disabled", true)
                    },
                    complete: function (){
                        this_button.prop("disabled", false)
                    },
                    success: function (response_data) {
                        if (response_data.type == 'success'){
                            this_button.parent().parent().find('.image-display').attr("src",'{{ url('/') }}/'+response_data.image_src);
                            this_button.parent().find('.image-reset-btn').val('{{ url('/') }}/'+response_data.image_src);
                            this_button.parent().find('.image-importer').val('');
                            Swal.fire({
                                position: 'top-end',
                                icon: response_data.type,
                                title: response_data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }else{
                            Swal.fire({
                                icon: response_data.type,
                                title: 'Oops...',
                                text: response_data.message,
                            })
                        }
                    },
                    error: function (xhr) {
                        var errorMessage = '<div class="card bg-danger">\n' +
                            '                        <div class="card-body text-center p-5">\n' +
                            '                            <span class="text-white">';
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            errorMessage +=(''+value+'<br>');
                        });
                        errorMessage +='</span>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            footer: errorMessage
                        })
                    },
                })
            });
        });
    </script>
    @include('includes.image-upload-helper')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('assets/administrative/js/pages/crud/file-upload/image-input.js') }}"></script>
    <!--end::Page Scripts-->
@endpush
