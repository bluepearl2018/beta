<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('components.head')
    <body class="bg-primary" {{--style="background: url('/uploads/images/science-3334826_1920.jpg') no-repeat; background-size:cover; background-position:center top;"--}}>
        <div id="app" class="container-fluid m-0 p-0 bg-primary">
            <header class="d-flex row container-fluid m-0 p-0">
                @include('components.header')
            </header>
            @if(Request::is('home*'))
                <main class="d-flex container-fluid no-gutters m-0 p-0 bg-primary">
                    <div class="d-flex container-fluid flex-md-row flex-column no-gutters m-0 p-0">
                        <div class="col-xs-12 col-md-1 order-1 bg-primary">
                            <div class="nav flex-xs-row flex-md-column nav-pills m-0 h-100" id="v-pills-tab" role="tablist">
                                @include('partials.nav-sidenav')
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-11 order-12 bg-light">
                            <div class="row-fluid container-fluid flex-md-row flex-column">
                                @yield('image')
                                <div style="background-color:lightgray; padding-bottom:0">
                                    @yield('breadcrumbs')
                                </div>
                                <div class="container-fluid row-fluid m-0 p-0 row no-gutters">
                                    <div class="col-12 order-12 order-md-12 bg-light">
                                        @include('components.userDashboard')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            @elseif(Request::is('contributions*'))
                <main class="d-flex container-fluid no-gutters m-0 p-0 bg-primary">
                    <div class="d-flex container-fluid flex-md-row flex-column no-gutters m-0 p-0">
                        <div class="col-xs-12 col-md-1 order-1 bg-primary">
                            <div class="nav flex-xs-row flex-md-column nav-pills m-0 h-100" id="v-pills-tab" role="tablist">
                                @include('partials.nav-sidenav')
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-11 order-12 bg-light">
                            <div class="row-fluid container-fluid flex-md-row flex-column">
                                @yield('image')
                                <div style="background-color:lightgray; padding-bottom:0">
                                    @yield('breadcrumbs')
                                </div>
                                <div class="container-fluid row-fluid m-0 p-0 row no-gutters">
                                    <div class="col-12 order-12 order-md-12 bg-light">
                                        @include('components.userContributions')
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            @else
                <main class="d-flex container-fluid no-gutters m-0 p-0 bg-primary">
                    <div class="d-flex container-fluid flex-md-row flex-column no-gutters m-0 p-0">
                        <div class="col-xs-12 col-md-1 order-1 bg-primary">
                            <div class="nav flex-xs-row flex-md-column nav-pills m-0 h-100" id="v-pills-tab" role="tablist">
                                @include('partials.nav-sidenav')
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-11 order-12 bg-light">
                            <div class="row-fluid container-fluid flex-md-row flex-column m-0 p-0">
                                @yield('image')
                                <div style="background-color:lightgray; padding-bottom:0">
                                    @yield('breadcrumbs')
                                </div>
                                <div class="container-fluid row-fluid m-0 p-0 row no-gutters">
                                    <div class="col-xs-12 col-md-3 order-1 order-md-1 px-md-3 bg-secondary">
                                        @yield('aside')
                                    </div>
                                    <div class="col-xs-12 col-md-9 order-12 order-md-12 bg-light">
                                        @include('flash::message')
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            @endif
        </div>
        @include('components.footer')
        @yield('script')
    </body>
</html>
