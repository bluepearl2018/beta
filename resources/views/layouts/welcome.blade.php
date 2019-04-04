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
                <div class="col-md-11">
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