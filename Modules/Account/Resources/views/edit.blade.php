@extends('home')
@section('content')
<div class="border-left border-right border-bottom container py-3">
    @include('flash::message')
    <h1>
        <i class="fa fa-key"></i>
	    @lang('profile.editProfileTitle')
	</h1>
	<p class="lead">
        @lang('profile.editProfileLead')
    </p>
    @if ($errors->any())
        <div class="container alert alert-danger mb-2">
            <ul class="m-0 pb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <?php 
        $userProfile = \Modules\Account\Entities\UserProfile::where('user_id', Auth::User()->id)->firstOrFail(); 
    ?>
    <form action="/account/edit" method="POST">
        @csrf
        <div class="form-row">
                <!-- Gender -->
            
                <fieldset class="form-group col-md-4">
                    
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            @foreach(\App\Models\Gender::all() as $gender)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender_id" id="gender_mr" value="{{ $gender->id }}" required <?php if($userProfile->gender_id == $gender->id){ echo "checked"; }?> >
                                <label class="form-check-label" for="gender_id">
                                {{ $gender->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        @if ($errors->has('gender_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gender_id') }}</strong>
                            </span>
                        @endif
                    </div>
                
                </fieldset>
            
            <div class="form-group col-md-4">
                <label for="firstname">{{ __('Prénom')}}</label>
                <input type="text" class="form-control" id="firstname" placeholder="{{ Auth::user()->firstname}}" disabled>
            </div>
            @if ($errors->has('firstname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
            @endif
            <div class="form-group col-md-4">
                <label for="surname">{{ __('Nom de famille')}}</label>
                <input type="text" class="form-control" id="surname" placeholder="{{ Auth::user()->surname}}" disabled>
            </div>
            @if ($errors->has('surname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('surname') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="{{ Auth::user()->email}}" disabled>
            </div>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="form-group col-md-4">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" placeholder="{{ Auth::user()->name}}" disabled>
            </div>
            @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="address1">{{ __('Adresse (en deux parties si nécessaire)')}}</label>
            <input type="text" id="address1" value="{{ $userProfile->address1 }}" class="mb-3 form-control{{ $errors->has('address1') ? ' is-invalid' : '' }}" name="address1" placeholder="{{ old('address1') }}" required autofocus>
            <input type="text" id="address2" value="{{ $userProfile->address2 }}" class="form-control{{ $errors->has('address2') ? ' is-invalid' : '' }}" name="address2" placeholder="@if(old('address2')){{ old('address2') }}@endif" autofocus>
            @if ($errors->has('address1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address1') }}</strong>
                    </span>
            @endif
            @if ($errors->has('address2'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address2') }}</strong>
                    </span>
            @endif
        </div>
        <!-- Zip, City, State, Country -->
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="postal_code">{{ __('Code postal')}}</label>
                <input type="text" id="postal_code" value="{{ $userProfile->postal_code }}" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" placeholder="{{ old('postal_code') }}" required autofocus>
                @if ($errors->has('postal_code'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('postal_code') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="city">{{ __('Ville')}}</label>
                <input type="text" id="city" value="{{ $userProfile->city }}" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" placeholder="{{ old('city') }}" required autofocus>
                @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="state">{{ __('Province/Département')}}</label>
                <input type="text" id="state" value="{{ $userProfile->state }}" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" placeholder="{{ old('state') }}" autofocus>
                @if ($errors->has('state'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="country">{{ __('Pays')}}</label>
                <input type="hidden" name="country_id" value="{{ Auth::User()->country_id }}" />
                <input type="text" id="country" 
                class="form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }}" 
                name="country" placeholder="{{ $userProfile->country->name }}" disabled>
                @if ($errors->has('country_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- Secondaryemail + social Media -->
        <div class="form-row">
            <!-- Other mail -->
            <div class="form-group col-md-8">
                <label for="secondaryemail">{{ __('Adresse e-mail secondaire') }}</label>
                <input id="secondaryemail" type="text" class="form-control{{ $errors->has('secondaryemail') ? ' is-invalid' : '' }}" 
                name="secondaryemail" value="{{ $userProfile->secondaryemail }}" 
                placeholder="{{ old('secondaryemail') }}" required>
                @if ($errors->has('secondaryemail'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('secondaryemail') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <!-- Phone / Mobile -->
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="phone">{{ __('Numéro de téléphone') }}</label>
                <input id="phone" type="tel" value="{{ $userProfile->phone }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="{{ old('phone') }}" required>
                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
       

        <!-- Mobile Field -->
        
            <div class="form-group col-md-4">
                <label for="mobile">{{ __('Numéro de portable') }}</label>
                <input id="mobile" type="tel" value="{{ $userProfile->mobile }}" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" placeholder="{{ old('mobile') }}" required>
                @if ($errors->has('mobile'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('mobile') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <!-- Accept rules -->
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sincere" value="0" required>
                <label class="form-check-label" for="sincere">
                    {{ __('Je certifie que les données communiquées sont exactes.') }}
                </label>
                @if ($errors->has('sincere'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sincere') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <!--  Validate -->
        <button type="submit" class="btn btn-primary">{{ __('Sauvegarder les données.') }}</button>
        <!-- Submit Field -->
        <a href="/account" class="btn btn-outline-secondary">
            @lang('interface.cancel')
        </a>
    </form>
</div>
@endsection