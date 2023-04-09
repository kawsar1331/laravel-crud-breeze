    <!-- Header -->
@include('backend.layouts.header')
        <!-- Top Nav -->
    @include('backend.layouts.nav-top')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                    <!-- Side Nav -->
                @include('backend.layouts.nav-side')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('main-content')
                </main>
                        <!-- Footer -->
                    @include('backend.layouts.footer')
            </div>
        </div>
                <!-- JS -->
            @include('backend.layouts.js')
    </body>
</html>
