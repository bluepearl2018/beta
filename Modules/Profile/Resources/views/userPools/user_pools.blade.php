<div class="card mb-3">
    <h2 class="card-header bg-secondary">
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-pools/create">
            <i class="fa fa-plus"></i>
        </a>
        @if(Request::is('profile'))
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-pools">
            <i class="fa fa-edit"></i>
        </a>
        @endif
        @lang('profile.myPools')
    </h2>
    <div class="card-body">
        @isset($countPools)
            @if($countVisiblePools < $countPools)
            <p>
                <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
                @lang('profile.someItemsAreActiveButUnivislbe')
            </p>
            @endif
        @endisset
        @if($countPools < 1)
                <p>
                    <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
                    @lang('profile.setYourPoolsWarningTip')
                </p>
        @elseif($countPools > 0)
            <p>
                <span class="fa fa-exclamation-circle text-success mr-2"></span>
                @lang('profile.moreThanZeroPool')
            </p>
                    @include('profile::userPools.table', ['userPools' => $userPools])
        @endif
    </div>
</div>