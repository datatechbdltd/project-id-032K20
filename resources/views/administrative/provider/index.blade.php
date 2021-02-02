@extends('administrative.layout.app')
@push('title') {{ __('Providers') }} @endpush
@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
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
                                <a href="javascript:0;" class="text-muted">Providers</a>
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
											<span class="card-icon">
												<i class="flaticon2-user-1 text-primary"></i>
											</span>
                            <h3 class="card-label">Providers table</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="datatable" style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Join at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                           {{--added data by ajax datatables--}}
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
@endsection
@push('js')
    <script src="//code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            var dataTable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                pageLength: 5,
                // scrollX: true,
                "order": [[ 0, "desc" ]],
                ajax: '{{ route('api.administrative.providers') }}',
                columns: [
                    {data: 'Avatar', name: 'Avatar'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
                ]
            });
        });
    </script>
    <!--end::Page Scripts-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('assets/administrative/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('assets/administrative/js/pages/crud/datatables/data-sources/user-table.js') }}"></script>
    <!--end::Page Scripts-->
    <!--begin::Page Scripts(used by this page)-->
    <script>
        $(document).ready(function() {

        });
    </script>
    <!--end::Page Scripts-->
@endpush
