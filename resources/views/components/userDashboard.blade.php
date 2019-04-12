<div class="container-fluid m-0 px-0 py-3">
    @include('flash::message')
    <h1>
        <i class="fa fa-tachometer-alt"></i>
        @lang('interface.welcomeToYourDashboard')
    </h1>
    <p class="lead">
        @lang('interface.welcomeToYourDashboardLead')
    </p>
    <div class="card-deck">
        @include('account::partials.accountInfo')
        <div class="d-none d-sm-inline-block d-md-none w-100 clearfix"></div>
        @include('account::partials.accountRoles')
        <div class="d-sm-inline-block d-lg-none w-100 clearfix"></div>
        <div class="d-none d-md-inline-block d-lg-none w-100 clearfix"></div>
        @include('account::partials.accountPermissions')
        <div class="d-none d-sm-inline-block d-md-none w-100 clearfix"></div>
        @include('profile::partials.userProfileInfo')
        <div class="d-sm-inline-block d-lg-none w-100 clearfix"></div>
        <div class="d-none d-md-inline-block d-lg-none w-100 clearfix"></div>
    </div>
</div>
