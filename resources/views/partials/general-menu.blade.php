@isset($modules)
    <nav class="navbar navbar-expand-lg navbar-light p-0 px-2 border-bottom">
        <div id="general-menu" class="collapse navbar-collapse mr-auto px-2 text-dark">
            <ul class="navbar-nav text-dark w-100" style="z-index:9999; font-size:0.85rem">            
            @if ($modules->count())
                @foreach ($modules->where('front_status', 'on') as $data => $module)
                    <li class="nav-item @if ($loop->last)mr-auto @endif">
                        <a href="/{{ $module->slug }}" class="nav-link text-dark">
                            <span class="rounded p-1 text-light text-dark font-weight-normal border"><small>
                            <i class="fa fa-{{$module->icon}} mr-1 text-dark"></i>
                            </small>
                            {{ $module->name }}
                        </span>
                        </a>
                    </li>
                @endforeach
                    <li class="nav-item ml-auto">
                        <a href="/pages/about/job-offers/win-win-deal-for-go-live" class="nav-link text-dark">
                            <span class="rounded p-1 text-light text-dark font-weight-normal border"><small>
                            <i class="fa fa-exclamation-circle mr-1 text-dark"></i>
                            </small>
                            Offre de lancement
                        </span>
                        </a>
                    </li>
            @endif
            </ul>
        </div>
    </nav>
@endisset