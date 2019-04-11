<div class="container-fluid m-0 p-0">
    <div class="d-flex row no-gutters">
        <div class="col-lg-1 d-none d-lg-block order-1 bg-light">
            @include('partials.nav-sidenav')
        </div>
        <div class="col-lg-3 col-12 order-lg-2 order-12">
            @yield('aside')
        </div>
        <div class="col-lg-8 col-12 order-lg-3 order-2 border-left bg-light">
            @yield('image')
            @yield('breadcrumbs')
            <div class="card-body">
                @include('flash::message')
                @yield('content')
            </div>
        </div>
    </div>
</div>