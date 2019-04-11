<div class="card mb-3">
        <h2 class="w-100 card-header bg-secondary">
            <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-social-medias/create">
                <i class="fa fa-plus"></i>
            </a>
            @if(Request::is('profile'))
            <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-social-medias">
                <i class="fa fa-edit"></i>
            </a>
            @endif
            @lang('profile.mySocialMedias')
        </h2>
        <div class="card-body">
        @isset($countSocialmedias)
            @if($countVisibleSocialmedias < $countSocialmedias)
            <p>
                <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
                @lang('profile.someItemsAreActiveButUnivislbe')
            </p>
            @endif
        @endisset
        @if($countSocialmedias < 1)
                <p>
                    <span class="fa fa-exclamation-triangle text-warning mr-2"></span>
                    @lang('profile.zeroSocialMedia')
                </p>
        @elseif($countSocialmedias > 0)
                <p>
                    <span class="fa fa-exclamation-circle text-success mr-2"></span>
                    @lang('profile.moreThanZeroSocialMedia')
                </p>
                @component('profile::userSocialmedias.table', ['userSocialmedias' => $userSocialmedias])@endcomponent
                
        @endif
    </div>
</div>