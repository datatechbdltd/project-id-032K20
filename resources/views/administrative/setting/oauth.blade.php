@extends('administrative.layout.app')
@push('title') {{ __('oAuth Setup') }} @endpush
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                                <a href="javascript:0;" class="text-muted">Applications</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript:0;" class="text-muted">Setting</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript:0;" class="text-muted">oAuth</a>
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
                <div class="row">
                    <!--begin::form section-->
                    <div class="card card-custom">
                        <div class="row">
                            <!--begin::Google Form-->
                            <div class="col-xl-6 col-md-6">
                                <div class="card-header ribbon ribbon-clip ribbon-right bg-success">
                                    <div class="ribbon-target" style="top: 15px; height: 45px;">
                                        <span class="ribbon-inner bg-danger"></span><i class="fab fa-google icon-2x text-white"></i>
                                    </div>
                                    <h3 class="card-title">
                                        Google
                                    </h3>
                                </div>
                                <form class="form" action="{{ route('administrative.setting.oAuth.update') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group form-group-last">
                                            <div class="alert alert-custom alert-default" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                                <div class="alert-text">
                                                    <b>Ball back url: </b> <code>{{ url('/socialite/redirect/google') }}</code>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Client ID</label>
                                            <input name="client_id" required type="text" class="form-control form-control-solid" placeholder="Google client id" value="{{ get_static_option('google_client_id') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Client Secret</label>
                                            <textarea name="client_secret" required class="form-control form-control-solid" rows="3" placeholder="Google client secret">{{ get_static_option('google_client_secret') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <span class="switch switch-info">
                                            <label>
                                             <input type="checkbox" @if(get_static_option('google_o_auth_status') == 'Enable') checked @endif value="Enable" name="status"/>
                                             <span></span>
                                            </label>
                                           </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="type" value="google">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Google Form-->
                            <!--begin::Facebook Form-->
                            <div class="col-xl-6 col-md-6">
                                <div class="card-header ribbon ribbon-clip ribbon-right bg-success">
                                    <div class="ribbon-target" style="top: 15px; height: 45px;">
                                        <span class="ribbon-inner bg-danger"></span><i class="fab fa-facebook icon-2x text-white"></i>
                                    </div>
                                    <h3 class="card-title">
                                        Facebook
                                    </h3>
                                </div>
                                <form class="form" action="{{ route('administrative.setting.oAuth.update') }}" method="post">
                                    <div class="card-body">
                                        <div class="form-group form-group-last">
                                            <div class="alert alert-custom alert-default" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                                <div class="alert-text">
                                                    <b>Ball back url: </b> <code>{{ url('/socialite/redirect/facebook') }}</code>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Client ID</label>
                                            <input name="client_id" required type="text" class="form-control form-control-solid" placeholder="Facebook client id" value="{{ get_static_option('facebook_client_id') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Client Secret</label>
                                            <textarea name="client_secret" required class="form-control form-control-solid" rows="3" placeholder="Facebook client secret">{{ get_static_option('facebook_client_secret') }}</textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Status</label>
                                            <span class="switch switch-info">
                                            <label>
                                             <input type="checkbox" @if(get_static_option('facebook_o_auth_status') == 'Enable') checked @endif value="Enable" name="status"/>
                                             <span></span>
                                            </label>
                                           </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="type" value="facebook">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Facebook Form-->
                            <!--begin::Instagram Form-->
                            <div class="col-xl-6 col-md-6">
                                <div class="card-header ribbon ribbon-clip ribbon-right bg-success">
                                    <div class="ribbon-target" style="top: 15px; height: 45px;">
                                        <span class="ribbon-inner bg-danger"></span><i class="fab fa-instagram icon-2x text-white"></i>
                                    </div>
                                    <h3 class="card-title">
                                        Instagram
                                    </h3>
                                </div>
                                <form class="form" action="{{ route('administrative.setting.oAuth.update') }}" method="post">
                                    <div class="card-body">
                                        <div class="form-group form-group-last">
                                            <div class="alert alert-custom alert-default" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                                <div class="alert-text">
                                                    <b>Ball back url: </b> <code>{{ url('/socialite/redirect/instagram') }}</code>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Client ID</label>
                                            <input name="client_id" required type="text" class="form-control form-control-solid" placeholder="Instagram client id" value="{{ get_static_option('instagram_client_id') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Client Secret</label>
                                            <textarea name="client_secret" required class="form-control form-control-solid" rows="3" placeholder="Instagram client secret">{{ get_static_option('instagram_client_secret') }}</textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Status</label>
                                            <span class="switch switch-info">
                                            <label>
                                             <input type="checkbox" @if(get_static_option('instagram_o_auth_status') == 'Enable') checked @endif value="Enable" name="status"/>
                                             <span></span>
                                            </label>
                                           </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="type" value="instagram">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Instagram Form-->
                            <!--begin::Twitter Form-->
                            <div class="col-xl-6 col-md-6">
                                <div class="card-header ribbon ribbon-clip ribbon-right bg-success">
                                    <div class="ribbon-target" style="top: 15px; height: 45px;">
                                        <span class="ribbon-inner bg-danger"></span><i class="fab fa-twitter icon-2x text-white"></i>
                                    </div>
                                    <h3 class="card-title">
                                        Twitter
                                    </h3>
                                </div>
                                <form class="form" action="{{ route('administrative.setting.oAuth.update') }}" method="post">
                                    <div class="card-body">
                                        <div class="form-group form-group-last">
                                            <div class="alert alert-custom alert-default" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                                <div class="alert-text">
                                                    <b>Ball back url: </b> <code>{{ url('/socialite/redirect/twitter') }}</code>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Client ID</label>
                                            <input name="client_id" required type="text" class="form-control form-control-solid" placeholder="Twitter client id" value="{{ get_static_option('twitter_client_id') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Client Secret</label>
                                            <textarea name="client_secret" required class="form-control form-control-solid" rows="3" placeholder="Twitter client secret">{{ get_static_option('twitter_client_secret') }}</textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Status</label>
                                            <span class="switch switch-info">
                                            <label>
                                             <input type="checkbox" @if(get_static_option('twitter_o_auth_status') == 'Enable') checked @endif value="Enable" name="status"/>
                                             <span></span>
                                            </label>
                                           </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="type" value="twitter">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Twitter Form-->
                            <!--begin::GitHub Form-->
                            <div class="col-xl-6 col-md-6">
                                <div class="card-header ribbon ribbon-clip ribbon-right bg-success">
                                    <div class="ribbon-target" style="top: 15px; height: 45px;">
                                        <span class="ribbon-inner bg-danger"></span><i class="fab fa-github icon-2x text-white"></i>
                                    </div>
                                    <h3 class="card-title">
                                        GitHub
                                    </h3>
                                </div>
                                <form class="form" action="{{ route('administrative.setting.oAuth.update') }}" method="post">
                                    <div class="card-body">
                                        <div class="form-group form-group-last">
                                            <div class="alert alert-custom alert-default" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                                <div class="alert-text">
                                                    <b>Ball back url: </b> <code>{{ url('/socialite/redirect/github') }}</code>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Client ID</label>
                                            <input name="client_id" required type="text" class="form-control form-control-solid" placeholder="GitHub client id" value="{{ get_static_option('github_client_id') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Client Secret</label>
                                            <textarea name="client_secret" required class="form-control form-control-solid" rows="3" placeholder="GitHub client secret">{{ get_static_option('github_client_secret') }}</textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Status</label>
                                            <span class="switch switch-info">
                                            <label>
                                             <input type="checkbox" @if(get_static_option('github_o_auth_status') == 'Enable') checked @endif value="Enable" name="status"/>
                                             <span></span>
                                            </label>
                                           </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="type" value="github">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::GitHub Form-->
                            <!--begin::Linkedin Form-->
                            <div class="col-xl-6 col-md-6">
                                <div class="card-header ribbon ribbon-clip ribbon-right bg-success">
                                    <div class="ribbon-target" style="top: 15px; height: 45px;">
                                        <span class="ribbon-inner bg-danger"></span><i class="fab fa-linkedin icon-2x text-white"></i>
                                    </div>
                                    <h3 class="card-title">
                                        LinkedIn
                                    </h3>
                                </div>
                                <form class="form" action="{{ route('administrative.setting.oAuth.update') }}" method="post">
                                    <div class="card-body">
                                        <div class="form-group form-group-last">
                                            <div class="alert alert-custom alert-default" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                                <div class="alert-text">
                                                    <b>Ball back url: </b> <code>{{ url('/socialite/redirect/linkedin') }}</code>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Client ID</label>
                                            <input name="client_id" required type="text" class="form-control form-control-solid" placeholder="LinkedIn client id" value="{{ get_static_option('linkedin_client_id') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Client Secret</label>
                                            <textarea name="client_secret" required class="form-control form-control-solid" rows="3" placeholder="LinkedIn client secret">{{ get_static_option('linkedin_client_secret') }}</textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Status</label>
                                            <span class="switch switch-info">
                                            <label>
                                             <input type="checkbox" @if(get_static_option('linkedin_o_auth_status') == 'Enable') checked @endif value="Enable" name="status"/>
                                             <span></span>
                                            </label>
                                           </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="type" value="linkedin">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Linkedin Form-->
                        </div>
                    </div>
                    <!--end::form section-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
@push('js')
    <!--begin::Page Scripts(used by this page)-->
   <script src="{{ asset('assets/administrative/js/pages/crud/forms/widgets/tagify.js') }}"></script>
    <!--end::Page Scripts-->
@endpush
