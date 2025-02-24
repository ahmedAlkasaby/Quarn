<!doctype html>

<html lang={{ __('site.lang') }} class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir={{ __('site.dir') }}
    data-theme="theme-default" data-assets-path="admin/assets/" data-template="vertical-menu-template-starter">
    @include('admin.layout.head')

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @include('admin.layout.sidebar')

                <!-- Layout container -->
                <div class="layout-page">
                    @include('admin.layout.navbar')

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        @yield('content')
                    </div>


                    @include('admin.layout.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
        </div>
        <!-- / Layout wrapper -->
        @include('admin.layout.script')
    </body>

</html>
