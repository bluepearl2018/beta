<div class="d-flex">
	<div class="mr-auto text-left">
		<a href="/welcome" class="navbar-brand p-0 m-0 ml-2 ml-md-1 pl-md-3" 
		style="font-size:2.1em">
			<strong>
				<span style="color:#0a8398;letter-spacing:2px;">[</span>
				<span style="letter-spacing:1px;">e<span style="letter-spacing:1px;" class="d-none d-md-inline-block">utranet</span></span>
				<span style="color:#0a8398;letter-spacing:1px;">::</span>
				<span class="d-none d-md-inline-block">european translators' network</span>
			</strong>
		</a>
	</div>
	<div class="ml-auto mr-1 ml-lg-auto mr-lg-2 text-right">
		<ul id="topnav" class="list-inline text-right" style="margin:0.5em 0">
			@if (\Route::current()->getName() !== 'landing')
				<li class="list-inline-item">
					<a class="btn btn-outline-secondary"
					title="@lang('interface.pools')" 
					href="{{ url('/zones/pools') }}">
						<span class="d-block">
							<i class="fa fa-search" style="height:auto"></i>
							<span class="d-none d-lg-inline-block">
								Trouver un traducteur
							</span>
						<span>
					</a>
				</li>
				<li class="list-inline-item">
					<a class="btn btn-outline-secondary" 
					title="@lang('interface.collaborate')" 
					href="{{ url('workspace') }}">
						<span class="d-block">
							<i class="fa fa-handshake" style="height:auto"></i>
							<span class="d-none d-lg-inline-block">
								Collaborer
							</span>
						<span>
					</a>
				</li>
			@endif
		</ul>
	</div>
</div>