<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.head')
</head>
<body>
    <div id="app">
        @include('components.header')
        <main class="h-100">
                <div class="d-md-flex flex-row no-gutters justify-content-between" style="min-height: 710px; ">
                    <div class="col-md-1 pb-md-2 d-sm-none d-md-block order-sm-1 order-md-1 text-dark"
                        style="background-color:#e7e7e5c7">
                        @include('partials.nav-sidenav')
                    </div>
                    <div class="@guest col-md-3 @else switchCollapse show col-md-3 @endguest pb-md-2 d-sm-none d-md-block order-sm-1 order-md-11 text-dark"
                    style="background: url('/uploads/images/science-3334826_1920.jpg') no-repeat; background-size:cover; background-position:center top;">
                        @include('contact::nav.nav-contacts')
                    </div>
                    <div class="col-md-8 pb-md-2 order-12">
                        <div class="container py-3">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="footer">
        @include('components/footer')
    </div>
    @yield('script')
</body>
</html>