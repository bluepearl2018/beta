<!DOCTYPE html>
<html lang="en">
    <head>
       @include('components.head')
    </head>
    <body>
        @include('components.header')
        @include('components.main')
        @include('components.footer')
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/welcome.js') }}"></script> --}}
    </body>
</html>
