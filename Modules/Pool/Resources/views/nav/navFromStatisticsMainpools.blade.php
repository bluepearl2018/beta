
<ul class="list-inline mb-2">
    @if($translatorsInPool > 0)
    <li class="list-inline-item">
        <a href="/zones/pools/{{ $pool->code }}">
            <span class="badge badge-dark text-light d-inline-block">{{ $translatorsInPool }}&nbsp;@lang('pools.translators')</span>
        </a>
    </li>
    @endif
    @if(count($subpools[$i]) > 0)
    <li class="list-inline-item">
        <a href="/zones/pools/{{ $pool->code }}">
            <span class="badge badge-dark text-light d-inline-block">{{count($subpools[$i])}} @lang('pools.pools')</span>
        </a>
    </li>
    @endif
    @if($translatorsInPool < 1)
    <li class="list-inline-item">
        <span class="badge badge-default border text-dark d-inline-block"> 
            <i class="fa fa-exclamation-triangle"></i>
            @lang('pools.thisPoolRecruits')
        </span>
    </li>
    @endif
</ul>