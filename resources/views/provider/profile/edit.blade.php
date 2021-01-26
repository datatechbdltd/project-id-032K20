@extends('provider.layout.app')
@push('title') Profile Update @endpush
@section('header')
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30">Profile Update</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list">
                        <ul class="list-items d-flex justify-content-end">
                            <li><a href="{{route('provider.dashboard.index')}}" class="text-white">Dashboard</a></li>
                            <li>Profile Update </li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div><!-- end dashboard-bread -->
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Profile Setting</h3>
                        </div>
                        <div class="form-content middle-image-helper">
                            <div class="user-profile-action d-flex align-items-center pb-4">
                                <div class="overlay">
                                    <div class="overlay-wrapper rounded bg-light-success text-center">
                                        <img src="{{ asset($user->avatar ?? get_static_option('no_image')) }}" alt="" id="image-display" class="mw-100 w-200px image-display" width="50%">
                                    </div>
                                    <div class="overlay-layer mt-3">
                                        <input style="display: none" type="file" accept="image/*" class="image-importer">
                                        <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                           Choose Image
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn" value="{{ asset(auth()->user->avatar ?? get_static_option('no_image')) }}" >
                                            Reset
                                        </button>
                                        <button type="button" class="btn btn-icon btn-info mr-2 submit-btn">
                                            Upload Image
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="contact-form-action">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Name</label>
                                                <div class="form-group">
                                                    <span class="la la-user form-icon"></span>
                                                    <input class="form-control" type="text"  value="{{ $user->name }}" placeholder="Your name">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Email Address</label>
                                                <div class="form-group">
                                                    <span class="la la-envelope form-icon"></span>
                                                    <input class="form-control" type="text" value="{{ $user->email }}" placeholder="Your email">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Phone</label>
                                                <div class="form-group">
                                                    <span class="la la-phone form-icon"></span>
                                                    <input class="form-control" type="text" value="{{ $user->phone }}">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Address</label>
                                                <div class="form-group">
                                                    <span class="la la-map form-icon"></span>
                                                    <input class="form-control" type="text" value="{{ $user->address }}">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-12">
                                            <div class="btn-box">
                                                <button class="theme-btn" type="button">Save Changes</button>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                </form>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Documents</h3>
                        </div>
                        <div class="form-content middle-image-helper">
                            <div class="user-profile-action d-flex align-items-center pb-4">
                                <div class="overlay">
                                    <div class="overlay-wrapper rounded bg-light-success text-center">
                                        <img src="{{ asset(auth()->user->type->documents ?? get_static_option('no_image')) }}" alt="" id="image-display" class="mw-100 w-200px image-display" width="50%">
                                    </div>
                                    <div class="overlay-layer mt-3">
                                        <input style="display: none" type="file" accept="image/*" class="image-importer">
                                        <button type="button" class="btn btn-icon btn-info mr-2 image-chose-btn">
                                           Choose Image
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning mr-2 image-reset-btn" value="{{ asset(auth()->user->avatar ?? get_static_option('no_image')) }}" >
                                            Reset
                                        </button>
                                        <button type="button" class="btn btn-icon btn-info mr-2 submit-btn">
                                            Upload Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Change Email</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Current Email</label>
                                                <div class="form-group">
                                                    <span class="la la-envelope form-icon"></span>
                                                    <input class="form-control" type="text" placeholder="Current email">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">New Email</label>
                                                <div class="form-group">
                                                    <span class="la la-envelope form-icon"></span>
                                                    <input class="form-control" type="text" placeholder="New email">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">New Email Again</label>
                                                <div class="form-group">
                                                    <span class="la la-envelope form-icon"></span>
                                                    <input class="form-control" type="text" placeholder="New email again">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12">
                                            <div class="btn-box">
                                                <button class="theme-btn" type="button">Change Email</button>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                </form>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Change Password</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Current Password</label>
                                                <div class="form-group">
                                                    <span class="la la-lock form-icon"></span>
                                                    <input class="form-control" type="text" placeholder="Current password">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">New Password</label>
                                                <div class="form-group">
                                                    <span class="la la-lock form-icon"></span>
                                                    <input class="form-control" type="text" placeholder="New password">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">New Password Again</label>
                                                <div class="form-group">
                                                    <span class="la la-lock form-icon"></span>
                                                    <input class="form-control" type="text" placeholder="New password again">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-12">
                                            <div class="btn-box">
                                                <button class="theme-btn" type="button">Change Password</button>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                </form>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Payment Account Settings</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="input-box">
                                                <label class="label-text">Name on Card</label>
                                                <div class="form-group">
                                                    <span class="la la-pencil form-icon"></span>
                                                    <input class="form-control" type="text" name="text" value="Amex">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="input-box">
                                                <label class="label-text">Card Number</label>
                                                <div class="form-group">
                                                    <span class="la la-pencil form-icon"></span>
                                                    <input class="form-control" type="text" name="text" value="3275476222500">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="input-box">
                                                <label class="label-text">Expiry Month</label>
                                                <div class="form-group">
                                                    <span class="la la-pencil form-icon"></span>
                                                    <input class="form-control" type="text" name="text" value="MM">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="input-box">
                                                <label class="label-text">Expiry Year</label>
                                                <div class="form-group">
                                                    <span class="la la-pencil form-icon"></span>
                                                    <input class="form-control" type="text" name="text" value="YY">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="input-box">
                                                <label class="label-text">CVV</label>
                                                <div class="form-group">
                                                    <span class="la la-pencil form-icon"></span>
                                                    <input class="form-control" type="text" name="text" value="CVV">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-12">
                                            <div class="btn-box">
                                                <button class="theme-btn" type="submit">Save Changes</button>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                </form>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
    {{-- @include('includes.image-upload-helper') --}}
@endsection
@section('content')

@endsection
