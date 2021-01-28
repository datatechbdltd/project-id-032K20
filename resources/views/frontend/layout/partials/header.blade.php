<header class="header-area">
    <div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li>
                                    @if(get_static_option('company_main_phone'))
                                    <a href="tel:{{ get_static_option('company_main_phone') }}"><i class="la la-phone mr-1"></i>
                                        {{ get_static_option('company_main_phone') }}
                                    </a>
                                    @else
                                        <a href="#"><i class="la la-phone mr-1"></i>
                                            (123) 123-456
                                        </a>
                                    @endif
                                </li>
                                <li>
                                    @if(get_static_option('company_main_email'))
                                        <a href="mailto:{{ get_static_option('company_main_email') }}">
                                            <i class="la la-envelope mr-1"></i>
                                            {{ get_static_option('company_main_email') }}
                                        </a>
                                    @else
                                        <a href="#">
                                            <i class="la la-envelope mr-1"></i>info@example.com
                                        </a>
                                    @endif

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-right d-flex align-items-center justify-content-end">
                            <div class="header-right-action">
                                <div class="select-contain select--contain w-auto">
                                    <select class="select-contain-select" onchange="location = this.value;">
                                        @foreach(get_active_languages() as $active_language)
                                            <option value="{{ route('languageSwitcher', $active_language->code) }}" @if(current_language()->code == $active_language->code) selected @endif data-content='<span class="flag-icon flag-icon-us mr-1"></span> {{ $active_language->name }}'>
                                                {{ $active_language->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="header-right-action">
                                <div class="select-contain select--contain w-auto">
                                    <select class="select-contain-select" onchange="location = this.value;">
                                        @foreach(get_active_currencies() as $active_currency)
                                            <option value="{{ route('currencySwitcher', $active_currency->code) }}" @if(current_language()->code == $active_currency->code) selected @endif>
                                                {{ $active_currency->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="header-right-action">
                                @guest
                                    <a href="javascript:0" class="theme-btn theme-btn-small theme-btn-transparent mr-1" id="user-signup-btn">{{ __('Sign Up') }}</a>
                                    <a href="#" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#loginPopupForm">{{ __('Login') }}</a>
                                @else
                                    <a href="{{ route('login') }}" class="theme-btn theme-btn-small">{{ __('Dashboard') }}</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu-wrapper padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper">
                        <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                        <div class="logo">
                            <a href="{{ route('frontend.index') }}">
                                <img @if(get_static_option('website_logo')) src="{{ asset(get_static_option('website_logo')) }}" alt=""
                                     @else src="{{ asset('assets/frontend/images/logo.png') }}" alt="" @endif >
                            </a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                        </div><!-- end logo -->
                        <div class="main-menu-content">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ route('frontend.index') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li style="display:none;">
                                        <a href="#">Tour <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="#">Tour Full width</a></li>
                                            <li><a href="#">Tour Grid</a></li>
                                            <li><a href="#">Tour List</a></li>
                                            <li><a href="#">Tour Left Sidebar</a></li>
                                            <li><a href="#">Tour Right Sidebar</a></li>
                                            <li><a href="#">Tour details</a></li>
                                            <li><a href="#">Tour Booking</a></li>
                                            <li><a href="#">Tour Search Result</a></li>
                                        </ul>
                                    </li>
                                    <li style="display:none;">
                                        <a href="#">Cruise <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="#">Cruises</a></li>
                                            <li><a href="#">Cruise list</a></li>
                                            <li><a href="#">Cruise Sidebar</a></li>
                                            <li><a href="#">Cruise details</a></li>
                                            <li><a href="#">Cruise Booking</a></li>
                                            <li><a href="#">Cruise Search Result</a></li>
                                        </ul>
                                    </li>
                                    <li style="display:none;">
                                        <a href="#">Pages <i class="la la-angle-down"></i></a>
                                        <div class="dropdown-menu-item mega-menu">
                                            <ul class="row no-gutters">
                                                <li class="col-lg-3 mega-menu-item">
                                                    <ul>
                                                        <li><a href="#">add hotel <span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="#">add flight <span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="#">add tour <span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="#">add cruise <span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="#">add car<span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="#">User Dashboard</a></li>
                                                        <li><a href="#">Admin Dashboard</a></li>
                                                    </ul>
                                                </li>
                                                <li class="col-lg-3 mega-menu-item">
                                                    <ul>
                                                        <li><a href="#">User profile</a></li>
                                                        <li><a href="#">Become Local Expert</a></li>
                                                        <li><a href="#">contact</a></li>
                                                        <li><a href="#">Cart</a></li>
                                                        <li><a href="#">Checkout</a></li>
                                                        <li><a href="#">recover password</a></li>
                                                        <li><a href="#">payment received</a></li>
                                                    </ul>
                                                </li>
                                                <li class="col-lg-3 mega-menu-item">
                                                    <ul>
                                                        <li><a href="#">payment complete</a></li>
                                                        <li><a href="#">Destinations</a></li>
                                                        <li><a href="#">about</a></li>
                                                        <li><a href="#">Our Services</a></li>
                                                        <li><a href="#">Gallery</a></li>
                                                        <li><a href="#">pricing</a></li>
                                                        <li><a href="#">faq</a></li>
                                                    </ul>
                                                </li>
                                                <li class="col-lg-3 mega-menu-item">
                                                    <ul>
                                                        <li><a href="#">add new post <span class="badge bg-2 text-white">New</span></a></li>
                                                        <li><a href="#">blog full width</a></li>
                                                        <li><a href="#">blog grid</a></li>
                                                        <li><a href="#">blog sidebar</a></li>
                                                        <li><a href="#">blog details</a></li>
                                                        <li><a href="#">Coming Soon</a></li>
                                                        <li><a href="#">404 page</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li style="display:none;">
                                        <a href="#">Flight <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="#">Flight grid</a></li>
                                            <li><a href="#">Flight list</a></li>
                                            <li><a href="#">Flight sidebar </a></li>
                                            <li><a href="#">Flight details</a></li>
                                            <li><a href="#">Flight Booking</a></li>
                                            <li><a href="#">Flight Search Result</a></li>
                                        </ul>
                                    </li>
                                    <li style="display:none;">
                                        <a href="#">Hotel <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="#">Hotel grid</a></li>
                                            <li><a href="#">Hotel list</a></li>
                                            <li><a href="#">Hotel sidebar </a></li>
                                            <li><a href="#">Hotel details</a></li>
                                            <li><a href="#">Hotel Booking</a></li>
                                            <li><a href="#">Hotel Search Result</a></li>
                                            <li>
                                                <a href="#">Rooms <i class="la la-plus"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Room List</a></li>
                                                    <li><a href="#">Room Grid</a></li>
                                                    <li><a href="#">Search Result</a></li>
                                                    <li><a href="#">Search Result list</a></li>
                                                    <li><a href="#">Room Details</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li style="display:none;">
                                        <a href="#">car <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="#">car grid</a></li>
                                            <li><a href="#">car list</a></li>
                                            <li><a href="#">car sidebar </a></li>
                                            <li><a href="#">car details</a></li>
                                            <li><a href="#">Car Booking</a></li>
                                            <li><a href="#">Car Search Result</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        @guest
                        <div class="nav-btn">
                            <a href="javascript:0" class="theme-btn" id="provider-signup-btn">{{ __('Become a provider') }}</a>
                        </div>
                        @else
                            @if(auth()->user()->hasPermissionTo('provider-access'))
                                <div class="nav-btn">
                                    <a href="#" class="theme-btn" data-toggle="" data-target="">{{ __('Add a ticket') }}</a>
                                </div>
                                @endif
                         @endguest
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
