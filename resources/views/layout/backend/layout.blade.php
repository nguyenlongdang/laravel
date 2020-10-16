<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>AutoParts - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('linkCSS')

    @include('layout.backend.head')

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            @include('layout.backend.header')
        </header> <!-- ========== Left Sidebar Start ========== -->

        <div class="vertical-menu">
            @include('layout.backend.menu')
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')
                </div>
            </div>

            <footer class="footer">
                @include('layout.backend.footer')
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('layout.backend.script')

    @yield('linkJS')
</body>

</html>
