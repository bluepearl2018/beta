<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head')
<body>
    <div id="app">
        <header>
        @include('components.header')
        </header>
        <main class="m-0 p-0">
            @include('components.main')
        </main>
    </div>
    @include('components.footer')
    @yield('script')
</body>
</html>
