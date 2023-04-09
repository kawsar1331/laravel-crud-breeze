    <!-- Header -->
@include('frontend.layouts.header')

    @include('frontend.layouts.nav-header')
        <!-- End header area -->

    @include('frontend.layouts.site-branding')
        <!-- End site branding area -->

    @include('frontend.layouts.nav-menu')
    <!-- End mainmenu area -->
    
    <!-- Main Content -->
    @yield('main-content')

@include('frontend.layouts.footer')