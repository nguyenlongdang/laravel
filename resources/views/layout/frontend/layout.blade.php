<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('metaSeo')
    <title>Rozer -  @yield('title')</title>
    
    @include('layout.frontend.head')
</head>

<body>
    <!-- header -->
    <header class="header">
        @include('layout.frontend.header')
    </header>
    <!-- end header -->

    {{-- content --}}
    @yield('content')
    {{-- end content --}}

    <!-- footer -->
    <footer class="footer">
        @include('layout.frontend.footer')
    </footer>
    <!-- end footer -->

    <!-- back to top -->
    <section class="section">
        <div class="section__backtotop animate__animated animate__zoomOut">
            <i class="ion-android-arrow-up"></i>
        </div>
    </section>
    <!-- end back to top -->

    <!-- menu -->
    <section class="section">
        @include('layout.frontend.menu')
    </section>
    <!-- end menu -->

    <!-- wishlist -->
    <section class="section">
        @include('layout.frontend.wishlist')
    </section>
    <!-- end wishlist -->

    <!-- cart -->
    <section class="section">
        @include('layout.frontend.cart')
    </section>
    <!-- end cart -->

    <section class="overplay"></section>

    <!-- Modal -->
    <div class="modal fade" id="dataModal">
        @include('layout.frontend.modal')
    </div>
    <!-- Modal end -->

    @include('layout.frontend.script')

    @yield('linkAjax')
</body>

</html>
