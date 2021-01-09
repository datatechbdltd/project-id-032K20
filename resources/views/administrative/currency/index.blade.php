@extends('administrative.layout.app')
@push('title') {{ __('Currency setup') }} @endpush
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
                                <a href="javascript:0;" class="text-muted">Currencies</a>
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
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                    <div class="alert-text">
                        {{ __('Our base currency is DOLLAR') }}
                    </div>
                </div>

                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Currencies</h3>
                        </div>
                        <div class="card-toolbar">
                            <button class="btn font-weight-bold btn-light-info mr-2 add-currency-btn">Add new currency <span class="label label-danger ml-2"><i class="ki ki-plus icon-xs text-white"></i></span></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Bootstrap table-->
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th title="Field #1">Order ID</th>
                                <th title="Field #2">Name</th>
                                <th title="Field #3">Code</th>
                                <th title="Field #3">Sign</th>
                                <th title="Field #3">Rate</th>
                                <th title="Field #4">Status</th>
                                <th title="Field #5">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($currencies as $currency)
                                <tr>
                                    <td>{{ $loop->iteration  }}</td>
                                    <td>{{ $currency->name }}</td>
                                    <td>{{ $currency->code }}</td>
                                    <td>{{ $currency->sign }}</td>
                                    <td>{{ $rate[$currency->code] ?? '-' }}</td>
                                    <td>
                                        @if($currency->status == true)
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
                                        <a href="{{ route('administrative.currency.edit', $currency->id) }}" class="btn btn-shadow btn-icon btn-warning">
                                            <i class="flaticon2-edit"></i>
                                        </a>
                                        <a href="{{ route('administrative.currency.show', $currency->id) }}" class="btn btn-shadow btn-icon btn-info">
                                            <i class="flaticon-medical icon-lg"></i>
                                        </a>
                                        @if($currency->code != 'USD')
                                        <button type="button" class="btn btn-shadow btn-icon btn-danger delete-btn" value="{{ route('administrative.currency.destroy',$currency->id ) }}">
                                            <i class="flaticon-delete-1 icon-lg"></i>
                                        </button>
                                        <form class="delete-form" action="{{ route('administrative.currency.destroy',$currency->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!--end: Bootstrap table-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
    <!--begin::Modal-->
    <div class="modal fade" id="currency-add-modal" tabindex="-1" role="dialog" aria-labelledby="currency-add-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!--begin::Form-->
                    <form class="form" action="{{ route('administrative.currency.store') }}" method="post">
                        @csrf
                        <div class="form-group form-group-last">
                            <div class="alert alert-custom alert-default" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                <div class="alert-text">
                                    Note about currency add
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Select currency code</label>
                            <div></div>
                            <select class="custom-select form-control col-12 select2 is-invalid" id="kt_select2_2_validate" name="currency_code" style="width: 100%;" required>
                                <optgroup label="Currency code">
                                    @foreach($rate as $key => $value)
                                        <option @if(old('currency_code') == $key) selected @endif value="{{ $key }}">{{ $key }} = {{ $value }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Currency name</label>
                            <input type="text" class="form-control form-control-lg" value="{{ old('currency_name') }}"  placeholder="Currency name" name="currency_name" required/>
                        </div>
                        <div class="form-group">
                            <label>Currency sign</label>
                            <input type="text" class="form-control form-control-lg" value="{{ old('currency_sign') }}"  placeholder="Sign example $" name="currency_sign" required/>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <span class="switch switch-info">
                             <label>
                              <input type="checkbox" @if(old('currency_status') == true) checked @endif value="1" name="currency_status"/>
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
    <!--begin::Page Scripts(used by this page)-->
    <script>
        $(document).ready(function() {
            $('.add-currency-btn').click(function(){
                $('#currency-add-modal').modal('show');
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

    <script src="{{ asset('assets/administrative/js/pages/crud/forms/widgets/select2.js') }}"></script>
    <!--end::Page Scripts-->
@endpush
