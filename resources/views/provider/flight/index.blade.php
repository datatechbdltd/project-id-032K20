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
                                <h2 class="sec__title font-size-30">Flights</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list">
                            <ul class="list-items d-flex justify-content-end">
                                <li><a href="{{route('provider.dashboard.index')}}" class="text-white">Dashboard</a></li>
                                <li>Flight</li>
                                <li>All Flight</li>
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
                                                <td>
                                                    @if($flight->status == 'Pending') <span class="badge badge-danger py-1 px-2">{{ $flight->status }}</span> @endif
                                                    @if($flight->status == 'Approved') <span class="badge badge-primary py-1 px-2">{{ $flight->status }}</span> @endif
                                                    @if($flight->status == 'Sold') <span class="badge badge-success py-1 px-2">{{ $flight->status }}</span> @endif
                                                </td>
                                                <td>
                                                    <div class="table-content row">
                                                        <a class="btn btn-sm btn-info d-inline-block m-1" href="{{ route('provider.flight.edit', $flight->id) }}">Edit</a>
                                                        <form action="{{ route('provider.flight.destroy', $flight->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-danger d-inline-block delete-confirm m-1" data-name="{{ 'flight' }}" type="submit">Delete</button>
                                                        </form>

                                                        {{--<form class="d-inline-block pull-right" method="post" action="{{ route('provider.flight.destroy', $flight->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </form>--}}
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
@push('js')
<script>
    $(document).ready(function() {
        $('.delete-confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: `Are you sure to delete ${name}?`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //submit form
                    form.submit();
                }
            })
        });
    });
</script>
@endpush
