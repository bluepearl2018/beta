<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head')
<body>
    <div id="app">
        <header>
        @include('components.header')
        </header>
        <main class="m-0 p-0">
            <div class="row no-gutters p-0 m-0">
                <div class="col-md-1">
                    @include('partials.nav-sidenav')
                </div>
                <div class="@guest col-md-3 @else switchCollapse show col-md-3 @endguest pb-md-2 d-sm-none d-md-block order-sm-1 order-md-11 text-dark"
                style="background: url('/uploads/images/science-3334826_1920.jpg') no-repeat; background-size:cover; background-position:center top;">
                    @include('contact::nav.nav-contacts')
                </div>
                <div class="col-md-8 pb-md-2 order-12">
                    @yield('breadcrumbs')
                    @yield('image')
                    <div class="container py-3 border">
                        @include('flash::message')
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('components.footer')
    @yield('script')
</body>
</html>
