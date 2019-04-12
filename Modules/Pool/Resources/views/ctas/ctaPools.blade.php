<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-bolt"></i>
        <strong>Traducteur&nbsp;? Traductrice&nbsp;? Contribution pour affiliation&nbsp;!</strong>
    </div>
    <div class="card-body">
        <p>
            @lang('pool.contribute500Words')
        </p>
        {{--Get translation list--}}
        <form class="text-center" method="POST" action="/pools/contribute">
            @csrf
            <input name="poolRef" type="hidden" value="{{ $poolData->slug }}" />
            <button class="btn btn-sm btn-primary">@lang('pool.winWinDeal')</button>
        </form>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-users"></i>
        <strong>@lang('pool.joinThisPoolDirectly')</strong>
    </div>
    <div class="card-body">
        <p>@lang('pool.joinThisPool')</p>
        <div class="text-center">
            <a class="btn btn-sm btn-primary" href="{{route('users-pools.create')}}">
                @lang('pool.joinThisPoolLink')
            </a>
        </div>
    </div>
</div>