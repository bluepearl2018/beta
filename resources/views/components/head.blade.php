{{-- TODO --}}
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'APP_NAME') }} | @yield('pageTitle')</title>
        <meta name="description" content="@yield('pageDescription')" />
        <meta name="keywords" content="@yield('pageKeywords')" />
        <meta property="og:title" content="@yield('pageTitle')" />
        <meta name="csrf-token" content="{{csrf_token()}}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script src="{{ asset('js/moment-with-locales.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/tether.min.js') }}"></script> --}}
        
        <!-- Statistics  -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        
        @stack('scripts')
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="https://rawgit.com/tempusdominus/bootstrap-4/master/build/css/tempusdominus-bootstrap-4.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&subset=latin-ext" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="{{ mix('css/eutranet.css') }}" rel="stylesheet">
        @stack('scriptsEnd')
</head>