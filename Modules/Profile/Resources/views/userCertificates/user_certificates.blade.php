<!-- Vendor Certificates  -->
<div class="card mb-3">
    <h2 class="card-header bg-secondary">
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-certificates/create">
            <i class="fa fa-plus"></i>
        </a>
        @if(Request::is('profile'))
        <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-certificates">
            <i class="fa fa-edit"></i>
        </a>
        @endif
        @lang('profile.myCertificates')
    </h2>
    <div class="card-body">
        @isset($countCertificates)
            @if($countVisibleCertificates < $countCertificates)
            <p>
                <span class="fa fa-exclamation-triangle text-danger mr-2"></span>
                @lang('profile.someItemsAreActiveButUnivislbe')
            </p>
            @endif
        @endisset
        @if($countVisibleCertificates < 1)
                <p>
                    <span class="fa fa-exclamation-triangle text-warning mr-2"></span>
                    @lang('profile.zeroCertificate')
                </p>
        @elseif($countVisibleCertificates > 0)
                <p>
                    <span class="fa fa-exclamation-circle text-success mr-2"></span>
                    @lang('profile.moreThanZeroCertificate')
                </p>
                @include('profile::userCertificates.table')
        @endif 
    </div>
</div>