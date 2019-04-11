<div class="card mb-3">
	<h4 class="card-header bg-light">
		<span class="fa fa-user"></span>
		<strong>@lang('users.infoLogin')</strong>
	</h4>
	<div class="card-body">
		@lang('users.connectedAs')
		<strong>{{ auth()->user()->name }}</strong>, 
		@lang('users.memberSince') {{ date("d/m/Y", strtotime(auth()->user()->created_at)) }}.
		<h6 class="mt-3 border-bottom">@lang('users.myAccount')</h6>
		<div class="d-flex row no-gutters">
			@if(auth()->user()->email_verified_at)
				<div class="bg-success text-white mr-2 mb-2">@lang('users.emailVerified')</div>
				@else
				<div class="bg-danger mr-2 mb-2">@lang('users.emailNotVerified')</div>
			@endif
			@if($isVisible == FALSE)
				<div class="bg-danger mr-2 mb-2">@lang('users.accountNotVisible')</div>
				@else
				<div class="bg-success mr-2 mb-2">@lang('users.accountVisible')</div>
			@endif
			@if($isActive == FALSE)
				<div class="bg-danger mr-2 mb-2">@lang('users.accountNotActive')</div>
				@else
				<div class="bg-success float-left mr-2 mb-2">@lang('users.accountActive')</div>
			@endif
			@if($isFree == FALSE)
				<div class="bg-success float-left mr-2 mb-2">@lang('users.accountCertified')</div>
				@else
				<div class="bg-warning float-left mr-2 mb-2">@lang('users.accountNotCertified')</div>
			@endif
			@if($isPremium == TRUE)
				<div class="bg-success float-left mr-2 mb-2">@lang('users.accountPremium')</div>
				@elseif($isPremiumExclusive == TRUE)
					<div class="bg-success float-left mr-2 mb-2">@lang('users.accountPremiumExclusive')</div>
				@else
					<div class="bg-warning float-left mr-2 mb-2">@lang('users.accountFree')</div>
			@endif
		</div>
	</div>
</div>