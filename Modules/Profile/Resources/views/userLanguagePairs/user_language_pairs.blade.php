<div class="card mb-3">
    <h2 class="card-header bg-secondary">
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-language-pairs/create">
            <i class="fa fa-plus"></i>
        </a>
        @if(Request::is('profile'))
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-language-pairs">
            <i class="fa fa-edit"></i>
        </a>
        @endif
        @lang('profile.myLanguagePairs')
    </h2>
    <div class="card-body">
        @isset($countLanguagePairs)
            @if($countVisibleLanguagePairs < $countLanguagePairs)
            <p>
                <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
                @lang('profile.someItemsAreActiveButUnivislbe')
            </p>
            @endif
        @endisset
        @if($countLanguagePairs < 1)
            <p><span class="fa fa-exclamation-triangle text-warning mr-2"></span>
                @lang('profile.zeroLanguagePair')
            </p>
        @elseif($countLanguagePairs > 0)
            <p>
                <span class="fa fa-exclamation-circle text-success mr-2"></span>
                @lang('profile.moreThanZeroLanguagePair')
            </p>
            @include('profile::userLanguagePairs.table', ['userLanguagePairs' => $userLanguagePairs])
        @endif
    </div>
</div>