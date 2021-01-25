@extends('provider.layout.app')
@push('title') Create flight @endpush
@section('header')
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30">Flight</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list">
                        <ul class="list-items d-flex justify-content-end">
                            <li><a href="{{ route('provider.dashboard.index') }}" class="text-white">Dashboard</a></li>
                            <li><a href="{{ route('provider.flight.index') }}" class="text-white">Flight</a></li>
                            <li>Create new flight</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="form-box">
            <div class="form-title-wrap">
                <h3 class="title">Flight Create</h3>
            </div>
            <div class="form-content">
                <div class="contact-form-action">
                    <form action="{{route('provider.flight.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Leaving From</label>
                                    <div class="form-group">
                                        <input class="form-control" name="from" type="text" id="from" placeholder="Leaving from">
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Going To</label>
                                    <div class="form-group">
                                        <input class="form-control" name="to" type="text" id="to" placeholder="Going to">
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Price</label>
                                    <div class="form-group">
                                        <input class="form-control" name="price" type="number" id="price" min="1" step="0.01">
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Departing</label>
                                    <div class="form-group">
                                        <input class="form-control" name="departing" type="date" id="departing">
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Returning</label>
                                    <div class="form-group">
                                        <input class="form-control" name="returning" type="date" id="returning">
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->


                            <div class="col-lg-12">
                                <div class="btn-box">
                                    <button class="theme-btn" >Save</button>
                                </div>
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
                    </form>
                </div>
            </div>
        </div><!-- end form-box -->
    </div>
@endsection


