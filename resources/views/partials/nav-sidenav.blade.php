@guest
    @if (Route::has('login'))
        <a href="{{ route('login') }}" class="d-block text-center py-2 {{ Request::is('login*')? 'text-success' : 'text-light'}}" title="@lang('interface.login')">
            <span class="fa fa-2x fa-sign-in-alt align-middle"></span>
        </a>
    @endif
@endguest
@auth
    <a class="d-block text-center p-2 {{ Request::is('logout*')? 'text-success' : 'text-light'}}" title="@lang('interface.logout')" 
    onclick="document.getElementById('logoutForm').submit()">
        <span class="fa fa-2x fa-sign-out-alt align-middle"></span>
    </a>
@endauth

<a href="/welcome" class="d-block text-center p-2 {{ Request::is('welcome*')? 'text-success' : 'text-light'}}" title="@lang('interface.viewAlerts')">
    <span class="fa fa-2x fa-home align-middle"></span>
</a>

<a href="/home" class="d-block text-center p-2 {{ Request::is('home*')? 'text-success' : 'text-light'}}" title="@lang('interface.viewAlerts')">
    <span class="fa fa-2x fa-tachometer-alt align-middle"></span>
</a>

<a href="/account" class="d-block text-center p-2 {{ Request::is('account*')? 'text-success' : 'text-light'}}" title="@lang('interface.viewAccount')">
    <span class="fa fa-2x fa-key align-middle"></span>
</a>

<a href="/profile" class="d-block text-center p-2 {{ Request::is('profile*')? 'text-success' : 'text-light'}}" title="@lang('interface.viewProfile')">
    <span class="fa fa-2x fa-user-circle align-middle"></span>
</a>

<a href="/contributions" class="d-block text-center p-2 {{ Request::is('contributions*')? 'text-success' : 'text-light'}}" title="@lang('interface.viewProfile')">
    <span class="fa fa-2x fa-atom align-middle"></span>
</a>

<a href="/alerts" class="d-block text-center p-2 {{ Request::is('alerts*')? 'text-success' : 'text-light'}}" title="@lang('interface.viewAlerts')">
    <span class="fa fa-2x fa-bell align-middle"></span>
</a>

<a href="/pools" class="d-block text-center p-2 {{ Request::is('pools*')? 'text-success' : 'text-light'}}" title="@lang('interface.viewAlerts')">
    <span class="fa fa-2x fa-search align-middle"></span>
</a>

<a href="/news" class="d-block text-center p-2 {{ Request::is('news*')? 'text-success' : 'text-light'}}" title="@lang('interface.viewAlerts')">
    <span class="fa fa-2x fa-rss align-middle"></span>
</a>

<a href="/contact" class="d-block text-center p-2 {{ Request::is('contact*')? 'text-success' : 'text-light'}}" title="@lang('interface.viewAlerts')">
    <span class="fa fa-2x fa-envelope align-middle"></span>
</a>