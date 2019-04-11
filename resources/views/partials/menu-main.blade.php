<div class="container-fluid d-flex row justify-content-between m-0 p-0 bg-primary">
	<ul class="col-auto list-inline text-left mb-0">
		<li class="list-inline-item mr-2 d-md-none">
			<a class="nav-link border-0 text-light" data-toggle="collapse" href="#general-menu" aria-expanded="false" 
				aria-controls="general-menu">
					<i class="fa fa-bars"></i>
			</a>
		</li>
		<li class="list-inline-item mr-2 d-none d-md-inline-block">
			<a href="/welcome" class="nav-link mr-auto d-none d-md-block">
				<span class="text-secondary">@lang('interface.baseline')</span>
			</a>
		</li>
	</ul>
	<ul class="col-auto list-inline mb-0">
		<li class="list-inline-item mr-2">
			<a href="http://www.facebook.com/eutranet" target="_blank">
				<i class="fab fa-facebook fa-1x text-secondary"></i> 
			</a>
		</li>
		<li class="list-inline-item mr-2">
		<a href="http://www.twitter.com/eutranet" target="_blank">
			<i class="fab fa-1x fa-twitter text-secondary"></i> 
		</a>
		</li>
		<li class="list-inline-item mr-2">
			<a href="http://www.linkedin.com/eutranet" target="_blank">
				<i class="fab fa-1x fa-linkedin text-secondary"></i> 
			</a>
		</li>
		<li class="list-inline-item mr-2">
			<a href="/blog">
				<i class="fa fa-1x fa-rss text-secondary"></i> 
			</a>
		</li>
		<li class="list-inline-item mr-2">
			<a href="/contact">
				<i class="fa fa-1x fa-envelope text-secondary"></i> 
			</a>
		</li>
		@auth
			<li class="list-inline-item mr-2">
				<div class="dropdown">
					<a id="navbarConnected-btn" class="nav-link border d-flex" 
					href="#navbarConnected" 
					data-target="#navbarConnected" 
					data-toggle="collapse" aria-haspopup="false" aria-expanded="false" >
						<span>
							<i class="fa fa-user text-secondary align-middle"></i>
							{{ Auth::User()->name }}
						</span>
					</a>	
				</div>
			</li>
			<li class="list-inline-item mr-2">
				<form id="logoutForm" class="form-inline my-lg-0 d-inline-block" method="post" action="/logout" >
					@csrf  
					<a role="button" title="@lang('interface.logout')" 
					class="text-secondary" 
					onclick="document.getElementById('logoutForm').submit()" 
					style="padding:0.5rem 0.1rem !important">
						<span class="fa fa-sign-out-alt"></span>
					</a>
				</form>
			</li>
		@endauth
			@component('partials.language-selector')@endcomponent
		</ul>
</div>
<div id="navbarConnected" class="dropdown collapse bg-white p-3" 
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
<div class="container-fluid bg-secondary">
	@include('partials.language-bar')
</div>