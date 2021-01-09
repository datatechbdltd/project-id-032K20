<meta charset="utf-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>{{ config('app.name') }} | @stack('title')</title>
<meta name="author" content="{{ get_content_by_language('application_seo')['author'] ?? 'No author' }}">
<meta name="description" content="{{ get_content_by_language('application_seo')['description'] ?? 'No description' }}"/>
<meta property="og:image" content="{{ asset(get_static_option('meta_image')) }}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--begin::CSRF-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--end::CSRF-->
<!-- Favicon -->
<link rel="icon" @if(get_static_option('favicon')) href="{{ asset(get_static_option('favicon')) }}" @endif>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<!-- Template CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/line-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/animated-headline.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.filer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
<!--SweetAlert 2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--====== AJAX ======-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

