<!DOCTYPE html>
<html lang="en">
<head>
    @include('provider.layout.partials.head')
    @stack('css')
</head>
<body class="section-bg">
<!-- start cssload-loader -->
@include('provider.layout.partials.loader')
<!-- end cssload-loader -->

<!-- ================================
       START USER CANVAS MENU
================================= -->
@include('provider.layout.partials.user-canvas')
<!-- end user-canvas-container -->
<!-- ================================
       END USER CANVAS MENU
================================= -->

<!-- ================================
       START SIDEBAR NAV
================================= -->
@include('provider.layout.partials.sidebar')
<!-- end sidebar-nav -->
<!-- ================================
       END SIDEBAR NAV
================================= -->

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">
{{--@include('layouts.provider.partials.top-bar')--}}
    <!-- end dashboard-nav -->
    <div class="dashboard-content-wrap">
        @yield('header')
        <!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                @yield('content')
                <!-- end row -->
               @include('provider.layout.partials.footer')
                <!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div>
    <!-- end dashboard-content-wrap -->
</section>
<!-- end dashboard-area -->
<!-- ================================
    END DASHBOARD AREA
================================= -->

<!-- start scroll top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<!-- Template JS Files -->
@include('provider.layout.partials.foot')
@stack('js')
@include('includes.logout')
@include('sweetalert::alert')
</body>
</html>
