<!DOCTYPE html>
<html lang="{{  App::getLocale() }}">
<head>
    @include('frontend.layout.partials.head')
</head>
<body>
<!-- start cssload-loader -->
@include('frontend.layout.partials.loader')
<!-- end cssload-loader -->
<a href="#" class="rtl-btn">Right Button</a>

<!-- ================================
            START HEADER AREA
================================= -->
@include('frontend.layout.partials.header')
<!-- ================================
         END HEADER AREA
================================= -->

<!-- ================================
            START CONTENT SECTION
================================= -->
@yield('content')
<!-- ================================
         END CONTENT SECTION
================================= -->

<!-- ================================
       START FOOTER AREA
================================= -->
@include('frontend.layout.partials.footer')
<!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- ================================
       START MODAL
================================= -->
@include('frontend.layout.partials.modal')
<!-- ================================
       END MODAL
================================= -->

<!-- Template JS Files -->
@include('frontend.layout.partials.foot')
@include('includes.alert')
@include('sweetalert::alert')
@include('includes.logout')
</body>
</html>
