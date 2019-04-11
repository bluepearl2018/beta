<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('components.head')
    <body {{--style="background: url('/uploads/images/science-3334826_1920.jpg') no-repeat; background-size:cover; background-position:center top;"--}}>
        <div id="app" class="container-fluid m-0 p-0">
            <header class="d-flex row container-fluid m-0 p-0">
                @include('components.header')
            </header>
            <main class="d-flex row no-gutters m-0 bg-primary">
                @include('components.main')
            </main>
        </div>
        @include('components.footer')
        @yield('script')
    </body>
</html>
