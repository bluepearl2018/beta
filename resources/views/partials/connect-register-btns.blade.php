<div id="connect-register-btns" class="clearfix" style="background-color:#9e9478c7">
    @guest
    @if (Route::has('login'))
        <a href="{{ route('login') }}" role="button" class="btn btn-sm text-light float-right m-2 ml-2 border rounded">
            @lang('interface.login')
        </a>
    @endif
    @if (Route::has('register'))
        <a href="{{ route('register') }}" role="button" title="@lang('interface.register')" class="btn btn-sm text-light float-right m-2 ml-2 border rounded">
            @lang('interface.register')
        </a>
    @endif
    @endguest
    @auth
    <a class="btn btn-sm text-light float-right m-2 ml-2 border rounded"
    onclick="document.getElementById('logoutForm').submit()" >
        @lang('interface.logout')
    </a>
    @endauth
</div>