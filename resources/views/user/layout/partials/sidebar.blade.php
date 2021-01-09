<div class="sidebar-nav">
    <div class="sidebar-nav-body">
        <div class="side-menu-close">
            <i class="la la-times"></i>
        </div><!-- end menu-toggler -->
        <div class="author-content">
            <div class="d-flex align-items-center">
                <div class="author-img avatar-sm">
                    <img src="{{ auth()->user()->avatar ?? asset('/assets/uploads/images/no-image.png') }}" alt="avatar">
                </div>
                <div class="author-bio">
                    <h4 class="author__title">{{ auth()->user()->name }}</h4>
                    <span class="author__meta">Join at {{ auth()->user()->created_at->format('M Y') }}</span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrap">
            <ul class="sidebar-menu list-items">
                <li class="page-active"><a href="{{ route('user.dashboard.index') }}"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                {{--
                <li><a href="user-dashboard-booking.html"><i class="la la-shopping-cart mr-2 text-color"></i>My Booking</a></li>
                <li><a href="user-dashboard-profile.html"><i class="la la-user mr-2 text-color-2"></i>My Profile</a></li>
                <li><a href="user-dashboard-reviews.html"><i class="la la-star mr-2 text-color-3"></i>My Reviews</a></li>
                <li><a href="user-dashboard-wishlist.html"><i class="la la-heart mr-2 text-color-4"></i>Wishlist</a></li>
                <li><a href="user-dashboard-settings.html"><i class="la la-cog mr-2 text-color-5"></i>Settings</a></li>
                --}}
                <li><a href="javascript:0" class="logout-btn"><i class="la la-power-off mr-2 text-color-6"></i>Logout</a></li>
            </ul>
        </div><!-- end sidebar-menu-wrap -->
    </div>
</div><!-- end sidebar-nav -->
