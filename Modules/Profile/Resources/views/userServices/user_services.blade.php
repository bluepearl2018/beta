<div class="card mb-3">
        <h2 class="w-100 card-header bg-secondary">
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-services/create">
            <i class="fa fa-plus"></i>
        </a>
        @if(Request::is('profile'))
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-services">
            <i class="fa fa-edit"></i>
        </a>
        @endif
        @lang('profile.myServices')
    </h2>

    <div class="card-body">
            @isset($countServices)
        @if($countVisibleServices < $countServices)
        <p>
            <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
            @lang('profile.someItemsAreActiveButUnivislbe')
        </p>
        @endif
    @endisset
    @if($countServices < 1)
            <p>
                <span class="fa fa-exclamation-triangle text-warning mr-2"></span>
                @lang('profile.zeroService')
            </p>
    @elseif($countServices > 0)
            <p>
                <span class="fa fa-exclamation-circle text-success mr-2"></span>
                @lang('profile.moreThanZeroService')
            </p>
             @include('users.user_services.table')
                
    @endif
</div>
</div>