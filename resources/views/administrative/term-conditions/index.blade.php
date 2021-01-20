@extends('administrative.layout.app')
@push('title') {{ __('Term & Condition List') }} @endpush
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
                        <table class="table table-bordered table-hover table-checkable" id="user-table" style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Serial</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($termandconditions as $termandcondition)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $termandcondition->serial }}</td>
                                    <td>{{ $termandcondition->title }}</td>
                                    <td>{{ $termandcondition->description}}</td>
                                    <td>{{ $termandcondition->status}}</td>
                                    <td nowrap="nowrap">
                                        <a class="btn btn-info d-inline-block" href="{{ route('administrative.terms-condition.edit', $termandcondition->id) }}">Edit</a>
                                        <form class="d-inline-block pull-right" method="post" action="{{ route('administrative.terms-condition.destroy', $termandcondition->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" onclick="return confirm('Are you confirm to delete?')">Delete</button>
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
@endsection
@push('js')
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
