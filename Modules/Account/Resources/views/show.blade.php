<h2>
    <a class="text-dark float-right" role="button" href="/account/edit">
        <span class="fa fa-edit"></span>
    </a>
    Données associées à votre compte d'utilisateur</h2>
<p class="lead">
    Ces données permettent à Eutranet de communiquer avec vous.
    Ceci n'est pas votre profil public.
</p>
<div class="form-group row no-gutters my-0 mt-3">
    <div class="col-md-12 text-left mb-3">
        @if($userProfile->gender_id)
            {{ $userProfile->gender->name }} @endif
        {{ Auth::User()->firstname }}&nbsp;
        {{ Auth::User()->surname }}&nbsp;<br>
        @if($userProfile->address1)
            {!! $userProfile->address1 !!}
            <br>
            @endif
        @if($userProfile->address2){!! $userProfile->address2 !!}<br>@endif
        @if($userProfile->postal_code){!! $userProfile->postal_code !!}@endif
        @if($userProfile->city){!! $userProfile->city !!}<br>@endif
        @if($userProfile->state){!! $userProfile->state !!}, @endif
        @if(Auth::user()->country_id){{ Auth::user()->userProfile->country->name }}<br>@endif
        @if($userProfile->phone)<i class="fa fa-phone"></i>&nbsp;{!! $userProfile->phone !!}<br>@endif
        @if($userProfile->mobile)<i class="fa fa-mobile"></i>&nbsp;{!! $userProfile->mobile !!}<br>@endif
        @if(Auth::user()->VAT)<small>TVA&nbsp;: {!! Auth::user()->VAT !!}</small>@endif
    </div>
</div>