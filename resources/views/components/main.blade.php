<div class="row no-gutters p-0 m-0">
        <div class="col-md-1">
            @include('partials.nav-sidenav')
        </div>
        <div class="col-md-2" style="background-color: rgb(158, 148, 120);">
            @yield('menu')
        </div>
        <div class="col-md-6">
            @yield('breadcrumbs')
            @yield('image')
            <div class="container py-3 border">
                @include('flash::message')
                @yield('content')
            </div>
        </div>
        <div class="col-md-3">
            @yield('aside')
        </div>
</div>