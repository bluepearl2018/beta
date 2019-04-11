{{-- Organizations --}}
<div class="card">
    <h2 class="card-header">
            <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-organizations/create">
                <i class="fa fa-plus"></i>
            </a>
            @if(Request::is('profile'))
            <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-organizations">
                <i class="fa fa-edit"></i>
            </a>
            @endif
            @lang('profile.myOrganizations')
    </h2>
    <div class="card-body">
        @isset($countOrganizations)
            @if($countVisibleOrganizations < $countOrganizations)
            <p>
                <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
                @lang('profile.someItemsAreActiveButUnivislbe')
            </p>
            @endif
        @endisset
        @if(count($userOrganizations) < 1)
            <p><span class="fa fa-exclamation-triangle text-warning mr-2"></span>
                @lang('profile.zeroOrganization')
            </p>
            @elseif(count($userOrganizations) > 0)
            <p>
                <span class="fa fa-exclamation-circle text-success mr-2"></span>
                @lang('profile.moreThanZeroOrganization')
            </p>
            @include('profile::userOrganizations.table')
        @endif
    </div>
</div>