<!-- Vendor Files  -->
<div class="card mb-3"> 
    <h2 class="card-header">
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-files/create">
            <i class="fa fa-plus"></i>
        </a>
        @if(Request::is('profile'))
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-files">
            <i class="fa fa-edit"></i>
        </a>
        @endif
        @lang('profile.myFiles')
    </h2>
    <div class="card-body">
        @isset($countFiles)
            @if($countVisibleFiles < $countFiles)
            <p>
                <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
                @lang('profile.someItemsAreActiveButUnivislbe')
            </p>
            @endif
        @endisset
        @if($countVisibleFiles < 1)
                <p>
                    <span class="fa fa-exclamation-triangle text-warning mr-2"></span>
                    @lang('profile.zeroFile')
                </p>
        @elseif($countVisibleFiles > 0)
                <p>
                    <span class="fa fa-exclamation-circle text-success mr-2"></span>
                    @lang('profile.moreThanZeroFile')
                </p>
                @include('profile::userFiles.table')
        @endif
    </div>
</div>