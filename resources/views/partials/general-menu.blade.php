@if(!Request::is('/'))
    @isset($modules)
        <div id="general-menu" class="collapse show">
            <ul class="d-flex text-left row-no-gutters bg-secondary container-fluid m-0 py-2">
            @if ($modules->count())
                @foreach ($modules->where('front_status', 'on') as $data => $module)
                    <div class="col-md-3 @if ($loop->last)mr-auto @endif">
                        <h3 href="/{{ $module->slug }}" class="text-dark">
                            <span class="rounded pb-1">
                                <i class="fa fa-{{$module->icon}} mr-1 text-dark"></i>
                                {{ $module->name }}
                            </span>
                        </h3>
                    </div>
                @endforeach
                    <li class="nav-item ml-md-auto">
                        <a href="/pages/about/job-offers/win-win-deal-for-go-live" class="navbar-link text-dark">
                            <span class="rounded px-2 pb-1 border">
                                <i class="fa fa-exclamation-circle mr-1 text-dark"></i>
                                Offre de lancement
                            </span>
                        </a>
                    </li>
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="navbar-link text-dark" title="@lang('interface.register')">
                                    <span class="rounded px-2 pb-1 border">
                                        @lang('interface.register')
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endguest
            @endif
            </ul>
        </div>
    @endisset
@endif