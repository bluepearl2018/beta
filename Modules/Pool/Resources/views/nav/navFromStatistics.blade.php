<?php 
$countTranslatorsInPool[$i] = \Modules\Pool\Entities\PoolLinguist::where('pool_id', $pool->id)
->where('visibility_id', '=', '1')  
->count();
$countManagersInPool[$i] = \Modules\Pool\Entities\PoolManager::where('pool_id', $pool->id)
->where('visibility_id', '=', '1')  
->count();
$countDtpersInPool[$i] = \Modules\Pool\Entities\PoolDtper::where('pool_id', $pool->id)
->where('visibility_id', '=', '1')  
->count();
$countDevelopersInPool[$i] = \Modules\Pool\Entities\PoolDtper::where('pool_id', $pool->id)
->where('visibility_id', '=', '1')  
->count();
$countAcademicsInPool[$i] = \Modules\Pool\Entities\PoolAcademic::where('pool_id', $pool->id)
->where('visibility_id', '=', '1')  
->count();
 ?> 
<div class="flex-column mt-1">
    @if($countTranslatorsInPool[$i] > 0)
        <div class="flex-item">
            <a href="/pools/{!! $pool->parentPool->code !!}/{{ $pool->code }}">
                <span class="badge bg-success text-light d-inline-block">
                        {{ $countTranslatorsInPool[$i] }} 
                        @lang('pool.translators')</span>
            </a>
        </div>
        @elseif($countTranslatorsInPool[$i] == 0)
        <div class="flex-item">
            <a href="/pages/pools/join-a-pool-as-a-translator">
                <span class="badge badge-light text-dark d-inline-block">@include('pool::ctas.ctaJoinThisPoolAsALinguist')</span>
            </a>
        </div>
    @endif
    @if($countManagersInPool[$i] > 0)
        <div class="flex-item">
            <a href="/pools/{!! $pool->parentPool->code !!}/{{ $pool->code }}">
                <span class="badge bg-success text-light d-inline-block">
                    {{ $countManagersInPool[$i] }} 
                    @lang('pool.poolManager')
                </span>
            </a>
        </div>
        @elseif($countManagersInPool[$i] == 0)
        <div class="flex-item">
            <a href="/pages/pools/join-a-pool-as-a-manager">
                <span class="badge badge-light text-dark d-inline-block">@include('pool::ctas.ctaJoinThisPoolAsAManager')</span>
            </a>
        </div>
    @endif
    @if($countDtpersInPool[$i] > 0)
        <div class="flex-item">
            <a href="/pools/{!! $pool->parentPool->code !!}/{{ $pool->code }}">
                <span class="badge bg-success text-light d-inline-block">
                    {{ $countManagersInPool[$i] }} 
                    @lang('pool.poolManager')
                </span>
            </a>
        </div>
        @elseif($countDtpersInPool[$i] == 0)
        <div class="flex-item">
            <a href="/pages/pools/join-a-pool-as-a-dtper">
                <span class="badge badge-light text-dark d-inline-block">@include('pool::ctas.ctaJoinThisPoolAsADtper')</span>
            </a>
        </div>
    @endif
    @if($countDevelopersInPool[$i] > 0)
        <div class="flex-item">
            <a href="/pools/{!! $pool->parentPool->code !!}/{{ $pool->code }}">
                <span class="badge bg-success text-light d-inline-block">
                    {{ $countDevelopersInPool[$i] }} 
                    @lang('pool.poolManager')
                </span>
            </a>
        </div>
        @elseif($countDevelopersInPool[$i] == 0)
        <div class="flex-item">
            <a href="/pages/pools/join-a-pool-as-a-developer">
                <span class="badge badge-light text-dark d-inline-block">@include('pool::ctas.ctaJoinThisPoolAsADeveloper')</span>
            </a>
        </div>
    @endif
    @if($countAcademicsInPool[$i] > 0)
        <div class="flex-item">
            <a href="/pools/{!! $pool->parentPool->code !!}/{{ $pool->code }}">
                <span class="badge bg-success text-light d-inline-block">
                    {{ $countAcademicsInPool[$i] }} 
                    @lang('pool.poolManager')
                </span>
            </a>
        </div>
        @elseif($countAcademicsInPool[$i] == 0)
        <div class="flex-item">
            <a href="/pages/pools/join-a-pool-as-an-academic">
                <span class="badge badge-light text-dark d-inline-block">
                    @include('pool::ctas.ctaJoinThisPoolAsAnAcademic')</span>
            </a>
        </div>
    @endif
    @if($countManagersInPool[$i] == 0 || $countTranslatorsInPool[$i] == 0 || $countAcademicsInPool[$i] == 0 || $countDtpersInPool[$i] == 0 || countDevelopersInPool == 0)
        <div class="flex-item mt-3">
            <a href="/pages/pools/join-a-pool">
                @include('pool::ctas.ctaJoinThisPool')
            </a>
        </div>
    @endif
</div>