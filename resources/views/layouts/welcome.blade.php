<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('components.head')
    <body>
        <div id="app" class="container-fluid m-0 p-0">
            <header class="d-flex row container-fluid m-0 p-0">
                @include('components.header')
            </header>
            <main class="d-flex container-fluid m-0 p-0" style="background-color: rgb(158, 148, 120); height:100%;">
                @include('components.siteSection')
            </main>
        </div>
        @include('components.footer')
        @yield('script')
    </body>
</html>