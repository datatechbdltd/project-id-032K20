@extends('provider.layout.app')
@push('title') Create flight @endpush
@section('header')
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30">Travellers</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list">
                            <ul class="list-items d-flex justify-content-end">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li>Dashboard</li>
                                <li>Travellers</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <div>
                                    <h3 class="title">Traveller Lists</h3>
                                </div>
                            </div>
                            <div class="form-content">
                                <div class="table-form table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Leaving From</th>
                                            <th scope="col">Going To</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Departing</th>
                                            <th scope="col">Returning</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($flights as $flight)
                                               <tr {{--@if($loop->odd) class="bg-dark-o-45" @endif--}}>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$flight->from}}</td>
                                                <td>{{$flight->to}}</td>
                                                <td>{{$flight->price}}</td>
                                                <td>{{$flight->departing}}</td>
                                                <td>{{$flight->returning}}</td>
                                                <td><span class="badge badge-success py-1 px-2">{{$flight->status}}</span></td>
                                                <td>
                                                    <div class="table-content">
                                                        <a class="btn btn-sm btn-info d-inline-block" href="{{ route('provider.flight.edit', $flight->id) }}">Edit</a>
                                                        <form class="d-inline-block pull-right" method="post" action="{{ route('provider.flight.destroy', $flight->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div>
@endsection
@section('content')

@endsection
