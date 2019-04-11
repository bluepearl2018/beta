<!-- Language Pairs -->
<div class="card mb-3">
    <h2 class="card-header bg-secondary">
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-tools/create">
            <i class="fa fa-plus"></i>
        </a>
        @if(Request::is('profile'))
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-tools">
            <i class="fa fa-edit"></i>
        </a>
        @endif
        @lang('profile.myTools')
    </h2>
    <div class="card-body">
        @isset($countTools)
            @if($countVisibleTools < $countTools)
            <p>
                <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
                @lang('profile.someItemsAreActiveButUnivislbe')
            </p>
            @endif
        @endisset
        @if($countTools < 1)
            <p>
                <a class="btn btn-primary fa fa-wrench" href="{{route('users-tools.create')}}"></a>
                <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
                @lang('profile.setYourToolsWarningTip')
            </p>
            @elseif($countTools > 0)
            <p>
                <span class="fa fa-exclamation-circle text-success mr-2"></span>
                @lang('profile.moreThanZeroPool')
            </p>
            @include('profile::userTools.table')
        @endif
    </div>
</div>