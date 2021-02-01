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
                                <a href="javascript:0;" class="text-muted">Document</a>
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
                            <h3 class="card-label">Documents table</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('administrative.document.create') }}" class="btn font-weight-bold btn-light-info mr-2 ">Add new document <span class="label label-danger ml-2"><i class="ki ki-plus icon-xs text-white"></i></span></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="datatable" style="margin-top: 13px !important">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Correct example</th>
                                    <th>False example</th>
                                    <th>status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($document_type as $document)
                                <tr>
                                    <td>{{ $loop->iteration  }}</td>
                                    <td>{{ $document->name }}</td>
                                    <td>
                                        <img width="100px" height="80px" src="{{ asset($document->correct_example ?? get_static_option('no_image')) }}">
                                    </td>
                                    <td>
                                        <img width="100px" height="80px" src="{{ asset($document->false_example ?? get_static_option('no_image')) }}">
                                    </td>
                                    <td>
                                        @if($document->status == true)
                                            <span class="label label-inline label-light-success font-weight-bold">
                                                Activated
                                            </span>
                                        @else
                                            <span class="label label-inline label-light-danger font-weight-bold">
                                                Inactivated
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('administrative.document.edit', $document->id) }}" class="btn btn-shadow btn-icon btn-warning">
                                            <i class="flaticon2-edit"></i>
                                        </a>
                                        <a href="{{ route('administrative.document.show', $document->id) }}" class="btn btn-shadow btn-icon btn-info">
                                            <i class="flaticon-medical icon-lg"></i>
                                        </a>
                                        <button type="button" class="btn btn-shadow btn-icon btn-danger delete-btn" value="{{ route('administrative.document.destroy',$document->id ) }}">
                                            <i class="flaticon-delete-1 icon-lg"></i>
                                        </button>
                                        <form class="delete-form" action="{{ route('administrative.document.destroy',$document->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
    <!--begin::Modal-->
        <div class="modal fade" id="document-add-modal" tabindex="-1" role="dialog" aria-labelledby="document-add-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new document.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('administrative.document.store') }}" method="post">
                            @csrf
                            <div class="form-group form-group-last">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                    <div class="alert-text">
                                        Note about document add
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Document name</label>
                                <input type="text" class="form-control form-control-lg" value="{{ old('document_name') }}"  placeholder="Document name" name="document_name" required/>
                            </div>
                            <div class="row">
                                {{--currect_example--}}
                                <div class="form-group col-6 bg-light-success rounded ">
                                    <div class="col-6 text-right">
                                       <label for="example-search-input" class="col-form-label "><b>Currect example (134px, 38px)</b></label>
                                   </div>
                                   <div class="col-6">
                                       <div class="overlay">
                                           <div class="overlay-wrapper rounded bg-light-success text-center">
                                               <img  src="{{ asset('assets/uploads/images/no-image.png') }}" alt="" id="image-display" class="mw-100 w-200px image-display">
                                           </div>
                                           <div class="overlay-layer">
                                               <input style="display: none" type="file" accept="image/*" class="image-importer">
                                               <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                                   <i class="ki ki-plus text-white"></i>
                                               </button>
                                               <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn" value="{{ asset('assets/uploads/images/no-image.png') }}" >
                                                   <i class="ki ki-reload text-white"></i>
                                               </button>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                                {{--false_example--}}
                                <div class="form-group col-6 bg-light-success rounded ">
                                    <div class="col-6 text-right">
                                       <label for="example-search-input" class="col-form-label "><b>False example (134px, 38px)</b></label>
                                   </div>
                                   <div class="col-6">
                                       <div class="overlay">
                                           <div class="overlay-wrapper rounded bg-light-success text-center">
                                               <img src="{{ asset('assets/uploads/images/no-image.png') }}" alt="" id="image-display" class="mw-100 w-200px image-display">
                                           </div>
                                           <div class="overlay-layer">
                                               <input style="display: none" type="file" accept="image/*" class="image-importer">
                                               <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                                   <i class="ki ki-plus text-white"></i>
                                               </button>
                                               <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn"  value="{{ asset('assets/uploads/images/no-image.png') }}">
                                                   <i class="ki ki-reload text-white"></i>
                                               </button>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <span class="switch switch-info">
                                <label>
                                <input type="checkbox" @if(old('document_status') == true) checked @endif value="1" name="document_status"/>
                                <span></span>
                                </label>
                                </span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    <!--end::Modal-->
@endsection
@push('js')
<!--begin::Page Scripts-->
    <script>
        $(document).ready(function() {
            $('.add-document-btn').click(function(){
                $('#document-add-modal').modal('show');
            });

            $('.delete-btn').click(function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent().find('.delete-form').submit();
                    }
                })
            });
        });
    </script>
    @include('includes.image-upload-helper')

    <script src="{{ asset('assets/administrative/js/pages/crud/file-upload/image-input.js') }}"></script>
    <script src="{{ asset('assets/administrative/js/pages/crud/forms/widgets/select2.js') }}"></script>
<!--end::Page Scripts-->
@endpush
