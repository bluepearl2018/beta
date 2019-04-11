<div class="container-fluid m-0 p-0">
    <div class="d-flex row-fluid no-gutters">
        <div class="col-md-12 order-md-3 bg-light border-left">
            <div class="row-fluid m-0">
                @yield('image')
            </div>
            <div class="row-fluid no-gutters m-0 p-0 bg-primary">
                <div class="bg-secondary clear-fix col-md-12">
                    @yield('breadcrumbs')
                </div>
                @include('flash::message')
                <div class="container-fluid m-0 p-0 row-fluid py-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>