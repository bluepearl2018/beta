<div class="card mb-3 switchCollapse">
	<div class="card-body">
		<h4 class="h6 bg-light py-2">
			<span class="fa fa-user mx-2"></span>
			<strong>@lang('users.infoLogin')</strong>
		</h4>
		<small>
		@lang('users.connectedAs')
		<strong>{{ auth()->user()->name }}</strong>, 
		@lang('users.memberSince') {{ date("d/m/Y", strtotime(auth()->user()->created_at)) }}.
		</small>
		<h6 class="mt-3 border-bottom d-block w-100">@lang('users.myAccount')</h6>
		<div class="no-gutters">
			@if(auth()->user()->email_verified_at)
				<div class="badge badge-success float-left mr-2 mb-2">@lang('users.emailVerified')</div>
				@else
				<div class="badge badge-danger float-left mr-2 mb-2">@lang('users.emailNotVerified')</div>
			@endif
			@if($isVisible == FALSE)
				<div class="badge badge-danger float-left mr-2 mb-2">@lang('users.accountNotVisible')</div>
				@else
				<div class="badge badge-success float-left mr-2 mb-2">@lang('users.accountVisible')</div>
			@endif
			@if($isActive == FALSE)
				<div class="badge badge-danger float-left mr-2 mb-2">@lang('users.accountNotActive')</div>
				@else
				<div class="badge badge-success float-left mr-2 mb-2">@lang('users.accountActive')</div>
			@endif
			@if($isFree == FALSE)
				<div class="badge badge-success float-left mr-2 mb-2">@lang('users.accountCertified')</div>
				@else
				<div class="badge badge-warning float-left mr-2 mb-2">@lang('users.accountNotCertified')</div>
			@endif
			@if($isPremium == TRUE)
				<div class="badge badge-success float-left mr-2 mb-2">@lang('users.accountPremium')</div>
				@elseif($isPremiumExclusive == TRUE)
					<div class="badge badge-success float-left mr-2 mb-2">@lang('users.accountPremiumExclusive')</div>
				@else
					<div class="badge badge-warning float-left mr-2 mb-2">@lang('users.accountFree')</div>
			@endif
		</div>
		<div class="clearfix"></div>
		<h6 class="mt-3 border-bottom d-block w-100">@lang('profile.completeness')</h6>
		<div class="row">
			<div class="col-auto">
			<small>@lang('users.myAccount')</small> 
			</div>
			<div class="col-auto ml-auto">
				<a href="/my-user-account">
					<span class="badge badge-{{$profileInfo['ProfileStatus']}} mr-2">
						{{$profileInfo['ProfileCompleteness']}}%</span>
				<a>
				<a href="/my-user-account/edit"><span class="fa fa-wrench text-dark mr-2"></span><a>
			</div>
		</div>
		<div class="row">
			<div class="col-auto">
				<small>
					@lang('interface.pools')&nbsp;:
				</small> 
			</div>
			<div class="col-auto ml-auto">
				<span class="badge badge-{{$PoolStatus['PoolStatus']}} mr-2">
						{{$countPools}}</span>
				@if($countPools == 0)
				<a href="/zones/users/my-profile/users-pools/create"><span class="fa fa-plus text-dark mr-2"></span><a>
				@elseif($countPools > 0)
					<a href="/zones/users/my-profile/users-pools"><span class="fa fa-wrench text-dark mr-2"></span><a>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-auto">
				<small>
					@lang('interface.services')&nbsp;:
				</small> 
			</div>
			<div class="col-auto ml-auto">
				<span class="badge badge-{{$ServiceStatus['ServiceStatus']}} mr-2">
						{{$countServices}}</span>
				@if($countServices == 0)
					<a href="/zones/users/my-profile/users-services/create"><span class="fa fa-plus text-dark mr-2"></span><a>
				@elseif($countServices > 0)
					<a href="/zones/users/my-profile/users-services"><span class="fa fa-wrench text-dark mr-2"></span><a>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-auto">
				<small>
					@lang('interface.languagePairs')&nbsp;:
				</small> 
			</div>
			<div class="col-auto ml-auto">
				<span class="badge badge-{{$LanguagePairStatus['LanguagePairStatus']}} mr-2">
						{{ $countLanguagePairs }}</span>
				@if($countLanguagePairs == 0)
					<a href="/zones/users/my-profile/users-language-pairs/create">
						<span class="fa fa-plus text-dark mr-2"></span>
					<a>
				@elseif($countLanguagePairs > 0)
					<a href="/zones/users/my-profile/users-language-pairs">
						<span class="fa fa-wrench text-dark mr-2"></span>
					<a>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-auto">
				<small>
					@lang('interface.tools')&nbsp;:
				</small> 
			</div>
			<div class="col-auto ml-auto">
				<span class="badge badge-{{$ToolStatus['ToolStatus']}} mr-2">
						{{$countTools}}</span>
				@if($countTools == 0)
					<a href="/zones/users/my-profile/users-tools/create">
						<span class="fa fa-plus text-dark mr-2"></span>
					<a>
				@elseif($countTools > 0)
					<a href="/zones/users/my-profile/users-tools">
						<span class="fa fa-wrench text-dark mr-2"></span>
					<a>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-auto">
				<small>
					@lang('interface.socialMedias')&nbsp;:
				</small> 
			</div>
			<div class="col-auto ml-auto">
				<span class="badge badge-{{$SocialMediaStatus['SocialMediaStatus']}} mr-2">
						{{$countSocialmedias}}</span>
				@if($countSocialmedias == 0)
					<a href="/zones/users/my-profile/users-social-medias/create"><span class="fa fa-plus text-dark mr-2"></span><a>
				@elseif($countSocialmedias > 0)
					<a href="/zones/users/my-profile/users-social-medias"><span class="fa fa-wrench text-dark mr-2"></span><a>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-auto">
				<small>
					@lang('interface.organisations')&nbsp;:
				</small> 
			</div>
			<div class="col-auto ml-auto">
				<span class="badge badge-{{$OrganizationStatus['OrganizationStatus']}} mr-2">
						{{$countOrganizations}}</span>
				@if($countOrganizations == 0)
				<a href="/zones/users/my-profile/users-organizations/create"><span class="fa fa-plus text-dark mr-2"></span><a>
				@elseif($countOrganizations > 0)
					<a href="/zones/users/my-profile/users-organizations"><span class="fa fa-wrench text-dark mr-2"></span><a>
				@endif
			</div>
		</div>
	</div>
</div>