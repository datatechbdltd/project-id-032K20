<!-- start registration modal-shared -->
<div class="modal-popup">
    <div class="modal fade" id="registration-modal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title title" id="registration-modal-title">{{ __('Register') }}</h5>
                        <p class="font-size-14">{{ __('Welcome to') }} {{ config('app.name') }}</p>
                    </div>
                    <div class="signup-alert-area">
                        <!-- alert data come from jQuery -->
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="registration-alert-area">
                    <!-- alert data come from jQuery -->
                </div>
                <div class="modal-body">
                    <div class="contact-form-action">
                        <form method="post" id="registration-form">
                            <div class="input-box">
                                <label class="label-text">{{ __('Full Name') }}</label>
                                <div class="form-group">
                                    <span class="la la-user form-icon"></span>
                                    <input class="form-control" id="name" name="text" type="text" placeholder="Type your name">
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">{{ __('Email Address') }}</label>
                                <div class="form-group">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Type your email">
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">{{ __('Password') }}</label>
                                <div class="form-group">
                                    <span class="la la-lock form-icon"></span>
                                    <input class="form-control" id="password" name="password"  type="password" placeholder="Type password">
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">{{ __('Repeat Password') }}</label>
                                <div class="form-group">
                                    <span class="la la-lock form-icon"></span>
                                    <input class="form-control" id="password_confirmation" name="password_confirmation"  type="password" placeholder="Type again password">
                                </div>
                            </div><!-- end input-box -->
                            <div class="btn-box pt-3 pb-4">
                                <input type="hidden" name="type">
                                <button type="button" class="theme-btn w-100" id="registration-btn">{{ __('Register Account') }}</button>
                            </div>
                            <div class="action-box text-center">
                                <p class="font-size-14">{{ __('Or Sign up Using') }}</p>
                                <ul class="social-profile py-3">
                                    @if(get_static_option('google_o_auth_status') == 'Enable')
                                        <li><a href="{{ route('socialiteLogin', 'google') }}" class="bg-5 text-white"><i class="lab la-google"></i></a></li>
                                    @endif
                                    @if(get_static_option('facebook_o_auth_status') == 'Enable')
                                        <li><a href="{{ route('socialiteLogin', 'facebook') }}" class="bg-5 text-white"><i class="lab la-facebook-f"></i></a></li>
                                    @endif
                                    @if(get_static_option('instagram_o_auth_status') == 'Enable')
                                        <li><a href="#" class="bg-7 text-white"><i class="lab la-instagram"></i></a></li>
                                    @endif
                                    @if(get_static_option('twitter_o_auth_status') == 'Enable')
                                        <li><a href="#" class="bg-6 text-white"><i class="lab la-twitter"></i></a></li>
                                    @endif
                                    @if(get_static_option('linkedin_o_auth_status') == 'Enable')
                                        <li><a href="{{ route('socialiteLogin', 'linkedin') }}" class="bg-5 text-white"><i class="lab la-linkedin-in"></i></a></li>
                                    @endif
                                    @if(get_static_option('github_o_auth_status') == 'Enable')
                                        <li><a href="{{ route('socialiteLogin', 'github') }}" class="bg-5 text-white"><i class="lab la-github"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </form>
                    </div><!-- end contact-form-action -->
                </div>
            </div>
        </div>
    </div>
</div><!-- end provider modal-popup -->

<!-- start sign in modal-shared -->
<div class="modal-popup">
    <div class="modal fade" id="loginPopupForm" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title title" id="exampleModalLongTitle2">{{ __('Sign In') }}</h5>
                        <p class="font-size-14">{{ __('Welcome to') }} {{ config('app.name') }}</p>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="login-alert-area">
                    <!-- alert data come from jQuery -->
                </div>
                <div class="modal-body">
                    <div class="contact-form-action">
                        <form method="post" id="login-form">
                            <div class="input-box">
                                <label class="label-text">{{ __('Email') }}</label>
                                <div class="form-group">
                                    <span class="la la-user form-icon"></span>
                                    <input class="form-control" type="email" name="email" placeholder="{{ __('Type your Email') }}">
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">{{ __('Password') }}</label>
                                <div class="form-group mb-2">
                                    <span class="la la-lock form-icon"></span>
                                    <input class="form-control" type="password" name="password" placeholder="{{ __('Type your password') }}">
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="custom-checkbox mb-0">
                                        <input type="checkbox" id="remembercheck">
                                        <label for="remembercheck">{{ __('Remember me') }}</label>
                                    </div>
                                    <p class="forgot-password">
                                        <a href="#">{{ __('Forgot Password ?') }}</a>
                                    </p>
                                </div>
                            </div><!-- end input-box -->
                            <div class="btn-box pt-3 pb-4">
                                <button type="button" class="theme-btn w-100" id="login-button">
                                    {{ __('Sign In') }}
                                </button>
                            </div>
                            <div class="action-box text-center">
                                <p class="font-size-14">{{ __('Sign in with Google') }}</p>
                                <ul class="social-profile py-3">
                                    <ul class="social-profile py-3">
                                        @if(get_static_option('google_o_auth_status') == 'Enable')
                                            <li><a href="{{ route('socialiteLogin', 'google') }}" class="bg-5 text-white"><i class="lab la-google"></i></a></li>
                                        @endif
                                        @if(get_static_option('facebook_o_auth_status') == 'Enable')
                                            <li><a href="{{ route('socialiteLogin', 'facebook') }}" class="bg-5 text-white"><i class="lab la-facebook-f"></i></a></li>
                                        @endif
                                        @if(get_static_option('instagram_o_auth_status') == 'Enable')
                                            <li><a href="#" class="bg-7 text-white"><i class="lab la-instagram"></i></a></li>
                                        @endif
                                        @if(get_static_option('twitter_o_auth_status') == 'Enable')
                                            <li><a href="#" class="bg-6 text-white"><i class="lab la-twitter"></i></a></li>
                                        @endif
                                        @if(get_static_option('linkedin_o_auth_status') == 'Enable')
                                            <li><a href="{{ route('socialiteLogin', 'linkedin') }}" class="bg-5 text-white"><i class="lab la-linkedin-in"></i></a></li>
                                        @endif
                                        @if(get_static_option('github_o_auth_status') == 'Enable')
                                            <li><a href="{{ route('socialiteLogin', 'github') }}" class="bg-5 text-white"><i class="lab la-github"></i></a></li>
                                        @endif
                                    </ul>
                                </ul>
                            </div>
                        </form>
                    </div><!-- end contact-form-action -->
                </div>
            </div>
        </div>
    </div>
</div><!-- end sign in modal-popup -->

<!-- ================================
            START PAGE LAVEl SCRIPT
================================= -->
@guest
<script>
    $(document).ready(function() {
        //user signup btn
        $('#user-signup-btn').click(function(){
            $('#registration-form').find("[name='type']").val('user')
            $("#registration-modal-title").html('Register as an user')
            $('#registration-modal').modal('show');
        });

        //provider signup btn
        $('#provider-signup-btn').click(function(){
            $('#registration-form').find("[name='type']").val('provider')
            $("#registration-modal-title").html('Register as an provider')
            $('#registration-modal').modal('show');
        });

        //registration
        $('#registration-btn').click(function(){
            var formData = new FormData();
            formData.append('type',  $('#registration-form').find("[name='type']").val())
            formData.append('name', $('#registration-form').find("[name='name']").val())
            formData.append('email', $('#registration-form').find("[name='email']").val())
            formData.append('password', $('#registration-form').find("[name='password']").val())
            formData.append('password_confirmation', $('#registration-form').find("[name='password_confirmation']").val())
                $.ajax({
                    method: 'POST',
                    url: "{{ route('register') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        $("#registration-btn").append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').prop("disabled",true);
                    },
                    complete: function (){
                        $("#registration-btn").prop("disabled",false).find('.spinner-border').remove();
                    },
                    success: function (data) {
                        if (data.type == 'success'){
                            $('#login-form').trigger("reset");
                            Swal.fire({
                                position: 'top-end',
                                icon: data.type,
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function() {
                                location.replace(data.url);
                            }, 400);//
                        }else{
                            console.log(data)
                            frontend_alert(data.type, data.message, 'registration-alert-area'); //type message place(class)
                        }
                    },
                    error: function (xhr) {
                        var errorMessage="";
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            errorMessage +=(''+value+'<br>');
                        });
                        frontend_alert('danger', errorMessage, 'registration-alert-area'); //type message place(class)
                    },
                })
        });

        //Login
        $('#login-button').click(function(){
            var formData = new FormData();
            var email       = $('#login-form').find("[name='email']").val();
            var password    = $('#login-form').find("[name='password']").val();
            formData.append('email', email)
            formData.append('password', password)
                $.ajax({
                    method: 'POST',
                    url: "{{ route('login') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        $("#login-button").append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').prop("disabled",true);
                    },
                    complete: function (){
                        $("#login-button").prop("disabled",false).find('.spinner-border').remove();
                    },
                    success: function (data) {
                        if (data.type == 'success'){
                            $('#login-form').trigger("reset");
                            Swal.fire({
                                position: 'top-end',
                                icon: data.type,
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function() {
                                location.replace(data.url);
                            }, 800);//
                        }else{
                            console.log(data)
                            frontend_alert(data.type, data.message, 'login-alert-area'); //type message place(class)
                        }
                    },
                    error: function (xhr) {
                        var errorMessage="";
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            errorMessage +=(''+value+'<br>');
                        });
                        frontend_alert('danger', errorMessage, 'login-alert-area'); //type message place(class)
                    },
                })
        });
    });
</script>
@endguest
<!-- ================================
         END PAGE LAVEl SCRIPT
================================= -->


