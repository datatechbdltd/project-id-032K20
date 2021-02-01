@extends('administrative.layout.app')
@push('title') {{ __('Doocument') }} @endpush
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
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ config('app.name') }}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="javascript:0;" class="text-muted">Document type edit</a>
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
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Edit document </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin::Form-->
                        <form class="form">
                            <div class="form-group">
                                <label>Document name</label>
                                <input type="text" class="form-control form-control-lg document_name" value="{{ $document_type->name }}" name="document_name" required/>
                                <input type="hidden" class="document_type_id" value="{{ $document_type->id }}" name="document_type_id" required/>
                            </div>
                            {{--currect_example--}}
                            <div class="form-group bg-light-success rounded middle-image-helper">
                                <div class="col-6 text-right">
                                    <label for="example-search-input" class="col-form-label "><b>Currect example (134px, 38px)</b></label>
                                </div>
                                <div class="col-6">
                                    <div class="overlay">
                                        <div class="overlay-wrapper rounded bg-light-success text-center">
                                            <img  src="{{ asset($document_type->correct_example ?? get_static_option('no_image')) }}" alt="" id="image-display" class="mw-100 w-200px image-display">
                                        </div>
                                        <div class="overlay-layer">
                                            <input style="display: none" type="file" accept="image/*" class="image-importer correct_example">
                                            <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                                <i class="ki ki-plus text-white"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn" value="{{ asset($document_type->correct_example ?? get_static_option('no_image')) }}" >
                                                <i class="ki ki-reload text-white"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--false_example--}}
                            <div class="form-group bg-light-success rounded middle-image-helper">
                                <div class="col-6 text-right">
                                    <label for="example-search-input" class="col-form-label "><b>False example (134px, 38px)</b></label>
                                </div>
                                <div class="col-6">
                                    <div class="overlay">
                                        <div class="overlay-wrapper rounded bg-light-success text-center">
                                            <img src="{{ asset($document_type->false_example ?? get_static_option('no_image')) }}" alt="" id="image-display" class="mw-100 w-200px image-display">
                                        </div>
                                        <div class="overlay-layer">
                                            <input style="display: none" type="file" accept="image/*" class="image-importer false_example">
                                            <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                                <i class="ki ki-plus text-white"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn"  value="{{ asset($document_type->false_example ?? get_static_option('no_image')) }}">
                                                <i class="ki ki-reload text-white"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Status</label>
                                <div class="col-9 col-form-label">
                                    <div class="radio-inline">
                                        <label class="radio radio-success">
                                            <input value="0" @if($document_type->status == 0)  checked="checked"  @endif type="radio" class="status" name="status"/>
                                            <span></span>
                                            Off
                                        </label>
                                        <label class="radio radio-success">
                                            <input value="1" @if($document_type->status == 1)  checked="checked"  @endif type="radio" class="status" name="status"/>
                                            <span></span>
                                            On
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Select user role</label>
                                <div class="col-9 col-form-label">
                                    <div class="radio-inline">
                                        @foreach ($user_type as $type)
                                            <label class="radio radio-success">
                                                <input id="id-{{ $type->id }}" value="{{ $type->id }}" @if(get_document_type_and_user_type($type->id,$document_type->id) == true)  checked="checked"  @endif class="user_role" type="checkbox" name="user_role"/>
                                                <span></span>
                                                {{ $type->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="submit-btn" class="btn btn-primary font-weight-bold">Save changes</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@endsection
@push('js')
    <!--begin::Page Scripts-->
    <script>
        $(document).ready(function() {
            //Submit image without reload
            $('#submit-btn').click(function(){

                var formData = new FormData();
                formData.append('name', $(this).parent().parent().find('.document_name').val())
                formData.append('correct_example', $(this).parent().parent().find('.correct_example')[0].files[0])
                formData.append('false_example', $(this).parent().parent().find('.false_example')[0].files[0])
                formData.append('status', $(this).parent().parent().find('.status:checked').val())
                formData.append('document_type_id', $(this).parent().parent().find('.document_type_id').val())



                var ids = []
                var checkboxes = document.querySelectorAll('.user_role:checked')
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].value != 'null'){
                        ids.push(checkboxes[i].value)
                    }
                }
                formData.append('user_role', ids)

                var this_button = $(this);
                $.ajax({
                    method: 'POST',
                    url: "{{ route('administrative.documentUpdate',$document_type->id) }}",
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
                            Swal.fire({
                                position: 'top-end',
                                icon: response_data.type,
                                title: response_data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            window.location.replace(response_data.url);
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
    <script src="{{ asset('assets/administrative/js/pages/crud/forms/widgets/select2.js') }}"></script>
    <!--end::Page Scripts-->
@endpush
