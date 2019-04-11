<div class="tab-pane fade show active" id="pills-details" role="tabpanel" 
aria-labelledby="pills-details-tab"><h2>
        Données personnelles de<br>{{ $selectedUser->firstname }} {{ $selectedUser->surname }}</h2>
    <p class="lead">
        <i class="fa fa-exclamation-triangle"></i>
        @lang('interface.gdprWarning')
    </p>
    <div class="form-group row no-gutters my-0 mt-3">
        <div class="col-md-12 text-left mb-3">
            @if($selectedProfile->gender_id)
                {{ $selectedProfile->gender->name }} @endif
            {{ $selectedUser->firstname }}&nbsp;
            {{ $selectedUser->surname }}&nbsp;<br>
            @if($selectedProfile->address1)
                {!! $selectedProfile->address1 !!}
                <br>
                @endif
            @if($selectedProfile->address2){!! $selectedProfile->address2 !!}<br>@endif
            @if($selectedProfile->postal_code){!! $selectedProfile->postal_code !!}@endif
            @if($selectedProfile->city){!! $selectedProfile->city !!}<br>@endif
            @if($selectedProfile->state){!! $selectedProfile->state !!}, @endif
            @if($selectedUser->country_id){!! $selectedUser->country->name !!}<br>@endif
            @if($selectedProfile->phone)<i class="fa fa-phone"></i>&nbsp;{!! $selectedProfile->phone !!}<br>@endif
            @if($selectedProfile->mobile)<i class="fa fa-mobile"></i>&nbsp;{!! $selectedProfile->mobile !!}<br>@endif
            @if($selectedUser->VAT)<small>TVA&nbsp;: {!! $selectedUser->VAT !!}</small>@endif
        </div>
    </div>
</div>