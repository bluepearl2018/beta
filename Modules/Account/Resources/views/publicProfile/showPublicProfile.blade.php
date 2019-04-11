<h2>Profil public de {{$selectedUser->firstname}} {{$selectedUser->surname}}</h2>
<p class="lead">
    {{ $userProfile->description }}
</p>
<div class="form-group row no-gutters my-0 mt-3">
    <div class="col-md-12 text-left mb-3">
        @if($userProfile->gender_id)
            {{ $userProfile->gender->name }} @endif
        {{ $selectedUser->firstname }}&nbsp;
        {{ $selectedUser->surname }}&nbsp;<br>
        @if($userProfile->address1)
            {!! $userProfile->address1 !!}
            <br>
            @endif
        @if($userProfile->address2){!! $userProfile->address2 !!}<br>@endif
        @if($userProfile->postal_code){!! $userProfile->postal_code !!}@endif
        @if($userProfile->city){!! $userProfile->city !!}<br>@endif
        @if($userProfile->state){!! $userProfile->state !!}, @endif
        @if($selectedUser->country_id){{ $selectedUser->country->name }}<br>@endif
        @if($userProfile->phone)<i class="fa fa-phone"></i>&nbsp;{!! $userProfile->phone !!}<br>@endif
        @if($userProfile->mobile)<i class="fa fa-mobile"></i>&nbsp;{!! $userProfile->mobile !!}<br>@endif
        @if($selectedUser->VAT)<small>TVA&nbsp;: {!! $selectedUser->VAT !!}</small>@endif
    </div>
</div>