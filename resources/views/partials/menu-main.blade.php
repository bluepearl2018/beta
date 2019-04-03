<div class="clearfix fixed-top header">
	<div class="d-flex clearfix">
		<ul class="mr-auto mr-2 mb-0 list-inline">
			<li class="list-inline-item">
				<a class="btn py-1 ml-3 d-lg-none
				 border-0"
					data-toggle="collapse" href="#general-menu" aria-expanded="false" 
					aria-controls="general-menu">
						<i class="fa fa-bars text-light"></i>
				</a>
			</li>
			<li class="list-inline-item">
				<a href="/welcome" class="mr-auto ml-3 d-none py-2 d-md-block">
					<span class="text-light">@lang('interface.baseline')</span>
				</a>
			</li>
		</ul>
		<ul class="ml-auto mr-2 mb-0 list-inline">
			<li class="list-inline-item">
				<a href="http://www.facebook.com/eutranet" target="_blank" 
				class="mr-2 my-2">
					<i class="fab fa-facebook fa-1x text-light"></i> 
				</a>
			</li>
			<li class="list-inline-item">
			<a href="http://www.twitter.com/eutranet" target="_blank" 
			class="mr-2 my-2">
				<i class="fab fa-1x fa-twitter text-light"></i> 
			</a>
			</li>
			<li class="list-inline-item">
				<a href="http://www.linkedin.com/eutranet" target="_blank" 
				class="mr-2 my-2">
					<i class="fab fa-1x fa-linkedin text-light"></i> 
				</a>
			</li>
			<li class="list-inline-item">
				<a href="/blog" 
				class="mr-2 my-2">
					<i class="fa fa-1x fa-rss text-light"></i> 
				</a>
			</li>
			<li class="list-inline-item">
				<a href="/contact"
				class="mr-2 my-2">
					<i class="fa fa-1x fa-envelope text-light"></i> 
				</a>
			</li>
			@auth
			{{---
				<li class="list-inline-item">
					<div class="dropdown">
						<a id="navbarConnected-btn" class="text-light" 
						data-target="#navbarConnected" role="button" 
						data-toggle="collapse" style="cursor:pointer"
						aria-haspopup="false" aria-expanded="false" >
							<span class="fa fa-user text-light"></span>
							<span class="d-none d-md-inline-block ml-2">{{ Auth::User()->name }}</span>
						</a>	
					</div>
				</li>
				--}}
				<li class="list-inline-item">
					<form id="logoutForm" class="form-inline my-lg-0 d-inline-block" method="post" action="/logout" >
						@csrf  
						<a role="button" title="@lang('interface.logout')" 
						class="text-light" 
						onclick="document.getElementById('logoutForm').submit()" 
						style="padding:0.5rem 0.1rem !important">
							<span class="fa fa-sign-out-alt"></span>
						</a>
					</form>
				</li>
			@endauth
			
			<li class="list-inline-item">
				@component('partials.language-selector')@endcomponent
			</li>
		</ul>
	</div>
</div>
<div class="container">
<div id="navbarConnected" class="dropdown collapse bg-white p-3 pr-5" 
aria-labelledby="navbarConnected-btn" aria-expanded="false"
style="font-size: 0.85em; z-index:1000000; position:absolute; max-width:370px; min-height:95%; right:0">
<a id="navbarConnected-btn" class="fa fa-times text-danger fa-2x" href="#" title="{{ ('Fermer le menu') }}" 
data-toggle="collapse" data-target="#navbarConnected" 
style="position:absolute; right:10px; top:10px"></a>
	@auth
		<a class="btn d-md-inline-block w-100 text-dark text-left py-2 pr-3" style="border-radius:0.5rem; border-bottom:dashed 2px #eeeeee" 
		href="/my-user-account">
			<i class="fas fa-key"></i>
			<span class="mx-2">
				@lang('interface.manageMyAccount')
			</span>
		</a>
		{{--
		@if(Auth()->user()->hasRole('vendor'))
			<a class="btn d-md-inline-block w-100 text-dark text-left py-2" style="border-radius:0.5rem; border-bottom:dashed 2px #eeeeee" 
			href="/zones/users/my-profile">
				<i class="fas fa-user-circle"></i>
				<span class="mx-2">
						@lang('interface.manageMyProfile')
				</span>
			</a>
		@endif
		@if(Auth()->user()->hasRole('buyer'))
			<a class="btn d-md-inline-block w-100 text-dark text-left py-2" style="border-radius:0.5rem; border-bottom:dashed 2px #eeeeee" 
			href="/zones/buyers/my-profile">
				<i class="fas fa-user-circle"></i>
				<span class="mx-2">
					@lang('interface.manageMyProfile')
				</span>
			</a>
		@endif
		--}}
		<a class="btn d-md-inline-block w-100 text-dark text-left py-2" style="border-radius:0.5rem; border-bottom:dashed 2px #eeeeee" 
		href="/zones/contacts/contact-eutranet">
			<i class="fa fa-envelope"></i>
			<span class="mx-2">
				@lang('interface.contactEutranet')
			</span>
		</a>
		<a class="btn d-md-inline-block w-100 text-dark text-left py-2" style="border-radius:0.5rem; border-bottom:dashed 2px #eeeeee" 
		href="/pages/services/subscriptions">
			<i class="fa fa-door-open"></i>
			<span class="mx-2">
				@lang('interface.subscribe')
			</span>
		</a>
		<a class="btn d-md-inline-block w-100 text-dark text-left py-2" 
		style="border-radius:0.5rem;" 
		onclick="document.getElementById('logoutForm').submit()" >
			<i class="fa fa-sign-out-alt"></i>
			<span class="mx-2">
				@lang('interface.logout')
			</span>
		</a>
	@endauth
</div>
</div>@include('partials.language-bar')