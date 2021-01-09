@extends('frontend.layout.app')
@push('title') User Type @endpush
@push('description')

@endpush
@push('css')

@endpush
@section('content')
    <section class="user-area padding-top-100px padding-bottom-60px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="title font-size-24">Profile Information</h3>
                    <div class="card-item user-card card-item-list mt-4 mb-0">
                        <div class="card-img">
                            <img src="{{ auth()->user()->avatar }}" alt="user image" class="h-auto">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">{{ auth()->user()->name }}</h3>
                            <p class="card-meta">Join at {{ auth()->user()->created_at->format('M Y') }}</p>
                            <div class="d-flex justify-content-between pt-3">
                                <ul class="list-items list-items-2 flex-grow-1">
                                    <li><span>Email:</span>{{ auth()->user()->email }}</li>
                                    <li><span>Phone:</span>{{ auth()->user()->phone }}</li>
                                    <li><span>Address:</span>{{ auth()->user()->address }}</li>
                                </ul>
                                <ul class="list-items flex-grow-1">
                                    <li><h3 class="title">Account type</h3></li>
                                    <div class="nav-btn">
                                        <a href="{{ route('frontend.assignPermission', 'user') }}" class="theme-btn">Become a user</a>
                                        <a href="{{ route('frontend.assignPermission', 'provider') }}" class="theme-btn">Become a provider</a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection

@push('js')

@endpush
