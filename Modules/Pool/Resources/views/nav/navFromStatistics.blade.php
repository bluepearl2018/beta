<?php 
$countTranslatorsInPool[$i] = \Modules\Pool\Entities\PoolLinguist::where('pool_id', $pool->id)
->where('visibility_id', '=', '1')  
->count();
 ?> 
<ul class="list-inline mb-2">
    @if($countTranslatorsInPool[$i] > 0)
    <li class="list-inline-item">
        <a href="/zones/pools/{!! $pool->parentPool->code !!}/{{ $pool->code }}">
            <span class="badge badge-dark text-light d-inline-block"> 
                    {{ $countTranslatorsInPool[$i] }} 
                    @lang('pool.translators')</span>
        </a>
    </li>
    @elseif($countTranslatorsInPool[$i] == 0)
    <li class="list-inline-item">
        <span class="badge badge-default border text-dark d-inline-block"> 
            <i class="fa fa-exclamation-triangle"></i>
            @lang('pool.thisPoolRecruits')
        </span>
    </li>
    
    @endif
</ul>