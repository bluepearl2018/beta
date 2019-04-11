<nav class="navbar navbar-expand-lg m-0 p-0" class="m-0 p-0" role="navigation">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#profile-navbar" 
    aria-controls="profile-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars text-dark"></span>
    </button>
    <div class="collapse navbar-collapse" id="profile-navbar">
        <ul class="nav flex-column nav-pills card-body m-0 bg-white" id="pills-tab" role="tablist">
            <li class="nav-item m-1 rounded">
                <a class="nav-link {{Request::is('profile') ? 'active' : 'bg-secondary' }}" 
                id="pills-profile-tab" href="/profile" 
                role="tab" aria-controls="pills-profile" aria-selected="{{Request::is('profile') ? 'true' : 'false' }}">
                    @lang('interface.profile')
                </a>
            </li>
            <li class="nav-item m-1 rounded">
                <a class="nav-link {{Request::is('*users-language-pairs*') ? 'active' : 'bg-secondary' }}" 
                id="pills-language-pairs-tab" href="/profile/users-language-pairs" 
                role="tab" aria-controls="pills-language-pairs" aria-selected="{{Request::is('*users-language-pairs*') ? 'true' : 'false' }}">
                    @lang('interface.languagePairs')
                    @if(($countVisibleLanguagePairs) < 1)
                    <span class="badge badge-danger">{{ $countVisibleLanguagePairs }}</span>
                    @elseif($countVisibleLanguagePairs == '1')
                    <span class="badge badge-warning">{{ $countVisibleLanguagePairs }}</span>
                    @elseif($countVisibleLanguagePairs > '1')
                    <span class="badge badge-success">{{ $countVisibleLanguagePairs }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item m-1 rounded">
                    <a class="nav-link {{Request::is('*users-social-medias*') ? 'active' : 'bg-secondary' }}" 
                    id="pills-social-medias-tab" href="/profile/users-social-medias" 
                role="tab" aria-controls="pills-social-medias" aria-selected="{{Request::is('*users-social-medias*') ? 'true' : 'false' }}">
                    @lang('interface.socialMedias')
                    @if(($countVisibleSocialmedias) < 1)
                    <span class="badge badge-danger">{{ $countVisibleSocialmedias }}</span>
                    @elseif($countVisibleSocialmedias == '1')
                    <span class="badge badge-warning">{{ $countVisibleSocialmedias }}</span>
                    @elseif($countVisibleSocialmedias > '1')
                    <span class="badge badge-success">{{ $countVisibleSocialmedias }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item m-1 rounded">
                    <a class="nav-link {{Request::is('*users-tools*') ? 'active' : 'bg-secondary' }}" 
                id="pills-tools-tab" href="/profile/users-tools" 
                role="tab" aria-controls="pills-tools" aria-selected="{{Request::is('*users-tools*') ? 'true' : 'false' }}">
                    @lang('interface.tools')
                    @if(($countVisibleTools) < 1)
                    <span class="badge badge-danger">{{ $countVisibleTools }}</span>
                    @elseif($countVisibleTools == '1')
                    <span class="badge badge-warning">{{ $countVisibleTools }}</span>
                    @elseif($countVisibleTools > '1')
                    <span class="badge badge-success">{{ $countVisibleTools }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item m-1 rounded">
                    <a class="nav-link {{Request::is('*users-pools*') ? 'active' : 'bg-secondary' }}"  
                id="pills-pools-tab" href="/profile/users-pools" 
                role="tab" aria-controls="pills-pools" aria-selected="{{Request::is('*users-pools*') ? 'true' : 'false' }}">
                    @lang('interface.pools')
                    @if(($countVisiblePools) < 1)
                    <span class="badge badge-danger">{{ $countVisiblePools }}</span>
                    @elseif($countVisiblePools == '1')
                    <span class="badge badge-warning">{{ $countVisiblePools }}</span>
                    @elseif($countVisiblePools > '1')
                    <span class="badge badge-success">{{ $countVisiblePools }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item m-1 rounded">
                    <a class="nav-link {{Request::is('*users-services*') ? 'active' : 'bg-secondary' }}"  
                    id="pills-services-tab" href="/profile/users-services" 
                role="tab" aria-controls="pills-services" aria-selected="{{Request::is('*users-services*') ? 'true' : 'false' }}">
                    @lang('interface.services')
                    @if(($countVisibleServices) < 1)
                    <span class="badge badge-danger">{{ $countVisibleServices }}</span>
                    @elseif($countVisibleServices == '1')
                    <span class="badge badge-warning">{{ $countVisibleServices }}</span>
                    @elseif($countVisibleServices > '1')
                    <span class="badge badge-success">{{ $countVisibleServices }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item m-1 rounded">
                <a class="nav-link {{Request::is('*users-organizations*') ? 'active' : 'bg-secondary' }}"  
                    id="pills-organizations-tab" href="/profile/users-organizations" 
                role="tab" aria-controls="pills-organizations" aria-selected="{{Request::is('*users-organizations*') ? 'true' : 'false' }}">
                    @lang('interface.organisations')
                    @if(($countVisibleOrganizations) < 1)
                    <span class="badge badge-danger">{{ $countVisibleOrganizations }}</span>
                    @elseif($countVisibleOrganizations == '1')
                    <span class="badge badge-warning">{{ $countVisibleOrganizations }}</span>
                    @elseif($countVisibleOrganizations > '1')
                    <span class="badge badge-success">{{ $countVisibleOrganizations }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item m-1 rounded">
                <a class="nav-link {{Request::is('*users-files*') ? 'active' : 'bg-secondary' }}"  
                    id="pills-files-tab" href="/profile/users-files" 
                role="tab" aria-controls="pills-files" aria-selected="{{Request::is('*users-files*') ? 'true' : 'false' }}">
                    @lang('interface.files')
                    @if(($countVisibleFiles) < 1)
                    <span class="badge badge-danger">{{ $countVisibleFiles }}</span>
                    @elseif($countVisibleFiles == '1')
                    <span class="badge badge-warning">{{ $countVisibleFiles }}</span>
                    @elseif($countVisibleFiles > '1')
                    <span class="badge badge-success">{{ $countVisibleFiles }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item m-1 rounded">
                <a class="nav-link {{Request::is('*users-certificates*') ? 'active' : 'bg-secondary' }}"  
                    id="pills-certificates-tab" href="/profile/users-certificates" 
                role="tab" aria-controls="pills-certificates" aria-selected="{{Request::is('*users-certificates*') ? 'true' : 'false' }}">
                    @lang('interface.certificates')
                    @if(($countVisibleCertificates) < 1)
                    <span class="badge badge-danger">{{ $countVisibleCertificates }}</span>
                    @elseif($countVisibleCertificates > 0)
                    <span class="badge badge-success">{{ $countVisibleCertificates }}</span>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</nav>