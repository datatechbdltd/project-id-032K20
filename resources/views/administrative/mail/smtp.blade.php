@extends('administrative.layout.app')
@push('title') {{ __('SMTP Setup') }} @endpush
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
                                <a href="{{ route('administrative.mail.smtp') }}" class="text-muted">Mail</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript:0;" class="text-muted">SMTP</a>
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
                   <div class="col-6">
                       <!--begin::Status btn-->
                       <div class="card card-custom">
                           <div class="card-header">
                               <h3 class="card-title">
                                   Mail permissions
                               </h3>
                               <div class="card-toolbar">
                                   <div class="example-tools justify-content-center">
                                       <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                       <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                                   </div>
                               </div>
                           </div>
                           <!--begin::Form-->
                           <form>
                               <div class="card-body">
                                   <div class="form-group mb-8">
                                       <div class="alert alert-custom alert-default" role="alert">
                                           <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                           <div class="alert-text">
                                               Permission notes
                                           </div>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                                   <div class="form-group row bg-light-success rounded ">
                                       <label for="example-search-input" class="col-6 col-form-label text-right">Permission name</label>
                                       <div class="col-6">
                                            <span class="switch switch-success">
												<label>
													<input type="checkbox" checked="checked" name="select" />
													<span></span>
												</label>
											</span>
                                       </div>
                                   </div>
                               </div>
                           </form>
                           <!--end::Form-->
                       </div>
                       <!--end::Status btn-->
                   </div>
                   <div class="col-6">
                       <!--begin::Form-->
                       <div class="card card-custom">
                           <div class="card-header">
                               <h3 class="card-title">
                                   SMTP Setup
                               </h3>
                               <div class="card-toolbar">
                                   <div class="example-tools justify-content-center">
                                       <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                       <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                                   </div>
                               </div>
                           </div>
                           <!--begin::Form-->
                               <div class="card-body">
                                   <div class="form-group mb-8">
                                       <div class="alert alert-custom alert-default" role="alert">
                                           <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                           <div class="alert-text">
                                               Note about smt setup..
                                           </div>
                                       </div>
                                   </div>
                                   <form action="{{ route('administrative.mail.smtp.update') }}" method="post">
                                       @csrf
                                       <div class="form-group">
                                           <label>Email host <span class="text-danger">*</span></label>
                                           <input type="email" name="host" required class="form-control"  placeholder="mail@domain.com" value="{{ get_static_option('smtp_email_host') }}"/>
                                       </div>
                                       <div class="form-group">
                                           <label>Email port <span class="text-danger">*</span></label>
                                           <input type="text" name="port" required class="form-control"  placeholder="465" value="{{ get_static_option('smtp_email_port') }}"/>
                                       </div>
                                       <div class="form-group">
                                           <label>Email username <span class="text-danger">*</span></label>
                                           <input type="email" name="username" required class="form-control"  placeholder="mail@domain.com" value="{{ get_static_option('smtp_email_username') }}"/>
                                       </div>
                                       <div class="form-group">
                                           <label>Email password <span class="text-danger">*</span></label>
                                           <input type="text" name="password" required class="form-control"  placeholder="your smtp password" value="{{ get_static_option('smtp_email_password') }}"/>
                                       </div>
                                       <div class="form-group">
                                           <label for="encryption">Mail encryption <span class="text-danger">*</span></label>
                                           <select name="encryption" required class="form-control" id="encryption">
                                               <option @if(get_static_option('smtp_email_encryption') == 'ssl') selected @endif value="ssl">ssl</option>
                                               <option @if(get_static_option('smtp_email_encryption') == 'tls') selected @endif value="tls">tls</option>
                                               <option @if(get_static_option('smtp_email_encryption') == 'none') selected @endif value="none">none</option>
                                           </select>
                                       </div>
                                       <div class="form-group">
                                           <label>From name<span class="text-danger">*</span></label>
                                           <input type="text" name="from_name" required class="form-control"  placeholder="brand name" value="{{ get_static_option('smtp_email_from_name') }}"/>
                                       </div>
                                       <div class="form-group">
                                           <label>From email<span class="text-danger">*</span></label>
                                           <input type="email" name="from_email" required class="form-control"  placeholder="mail@domain.com" value="{{ get_static_option('smtp_email_from_email') }}"/>
                                       </div>
                                   </form>
                               </div>
                               <div class="card-footer">
                                   <button type="submit" class="btn btn-primary mr-2">Submit SMTP configuration</button>
                               </div>

                               <div class="card-footer">
                                   <form action="{{ route('administrative.mail.smtp.test') }}" method="post">
                                       @csrf
                                       <div class="form-group">
                                           <label>Send test email to make sure that your SMTP settings is set correctly.</label>
                                           <div class="input-group">
                                               <input type="email" required name="email" class="form-control" placeholder="Type your email .. ">
                                               <div class="input-group-append">
                                                   <button class="btn btn-primary" type="submit">Test!</button>
                                               </div>
                                           </div>
                                       </div>
                                   </form>
                               </div>

                           <!--end::Form-->
                       </div>
                       <!--end::Form-->
                   </div>
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

    <!--end::Page Scripts-->
@endpush
