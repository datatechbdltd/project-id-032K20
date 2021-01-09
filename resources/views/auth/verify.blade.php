@extends('frontend.layout.app')
    @push('title') {{ __('Verify') }} @endpush
    @section('content')
        <!-- ================================
    START BREADCRUMB AREA
================================= -->
        <section class="breadcrumb-area" style="background-color: {{ get_static_option('website_hero_bg_color') ?? '#3B66A1' }}">
            <div class="breadcrumb-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="breadcrumb-content">
                                <div class="section-heading">
                                    <h2 class="sec__title">{{ __('Email verification') }}</h2>
                                </div>
                            </div><!-- end breadcrumb-content -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="breadcrumb-list">
                                <ul class="list-items d-flex justify-content-end">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li>Email verification</li>
                                </ul>
                            </div><!-- end breadcrumb-list -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end breadcrumb-wrap -->
            <div class="bread-svg-box">
                <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
            </div><!-- end bread-svg -->
        </section><!-- end breadcrumb-area -->
        <!-- ================================
            END BREADCRUMB AREA
        ================================= -->

        <!-- ================================
            START BOOKING AREA
        ================================= -->
        <section class="booking-area padding-top-100px padding-bottom-70px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{ __('Verify Your Email Address') }}</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content">
                                <div class="tab-content">
                                    {{--Email verification--}}
                                    <div class="tab-pane fade show active" id="credit-card" role="tabpanel" aria-labelledby="credit-card-tab">
                                        <div class="contact-form-action">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @if(session('resent'))
                                                        <div class="alert alert-primary text-center" role="alert">
                                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                                        </div>
                                                    @endif
                                                <!--begin::Title-->
                                                    <!--begin::Action-->
                                                    <div class="pb-lg-0 pb-5">
                                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                                        {{ __('If you did not receive the email please click on below button.') }}
                                                        <br>
                                                        <br>
                                                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                                            @csrf
                                                            <div class="btn-box">
                                                                <button type="submit" class="theme-btn">{{ __('Click here to request another') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--end::Action-->
                                                </div><!-- end col-lg-6 -->
                                            </div>
                                        </div><!-- end contact-form-action -->
                                    </div><!-- end tab-pane-->
                                </div><!-- end tab-content -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="form-box booking-detail-form">
                            <div class="form-title-wrap">
                                <h3 class="title">{{ __('Profile details') }}</h3>
                            </div><!-- end form-title-wrap -->
                            <div class="form-content">
                                <div class="comments-list">
                                    <div class="comment">
                                        <div class="comment-avatar">
                                            <img class="avatar__img" alt="" src="{{ auth()->user()->avatar ?? asset('assets/uploads/images/no-image.png') }}">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__author"> {{ auth()->user()->name }} </h3>
                                                <div class="meta-data-inner d-flex">
                                                   <p class="">{{ auth()->user()->email }}</p>
                                                </div>
                                            </div>
                                            <button class="theme-btn logout-btn">
                                                <span class="la la-sign-out mr-1"></span> Logout
                                            </button>
                                        </div>
                                    </div><!-- end comments -->
                                </div><!-- end comments-list -->
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-4 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end booking-area -->
        <!-- ================================
            END BOOKING AREA
        ================================= -->
    @endsection
