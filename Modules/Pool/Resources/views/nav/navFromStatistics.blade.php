<?php 
$countTranslatorsInPool[$i] = \Modules\Pool\Entities\PoolLinguist::where('pool_id', $pool->id)
->where('visibility_id', '=', '1')  
->count();
$countManagersInPool[$i] = \Modules\Pool\Entities\PoolManager::where('pool_id', $pool->id)
->where('visibility_id', '=', '1')  
->count();
 ?> 
<div class="flex-column">
    @if($countTranslatorsInPool[$i] > 0)
        <div class="flex-item">
            <a href="/pools/{!! $pool->parentPool->code !!}/{{ $pool->code }}">
                <span class="badge badge-dark text-light d-inline-block"> 
                        {{ $countTranslatorsInPool[$i] }} 
                        @lang('pool.translators')</span>
            </a>
        </div>
        @elseif($countTranslatorsInPool[$i] == 0)
        <div class="flex-item">
            <a href="/pages/pools/become-a-pool-manager">
                @include('pool::ctas.ctaPools')
            </a>
        </div>
    @endif
    @if($countManagersInPool[$i] > 0)
        <div class="flex-item">
            <a href="/pools/{!! $pool->parentPool->code !!}/{{ $pool->code }}">
                <span class="badge badge-dark text-light d-inline-block"> 
                    {{ $countManagersInPool[$i] }} 
                    @lang('pool.poolManager')
                </span>
            </a>
        </div>
        @elseif($countManagersInPool[$i] == 0)
        <div class="flex-item">
            <a href="/pages/pools/become-a-pool-manager">
                @include('pool::ctas.ctaManageThisPoolOneliner')
            </a>
        </div>
    @endif
</div>