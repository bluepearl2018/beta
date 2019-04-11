@extends('home')
@section('content')
    <div class="container py-3 border-left border-right border-bottom">
    @include('flash::message')
    <h1>
        <i class="fa fa-key"></i>
	    @lang('profile.createProfileTitle')
	</h1>
	<p class="lead">
        @lang('profile.createProfileLead')
	</p>
    <div class="row no-gutters container mb-3">
    <form action="/account/store" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
        <!-- Gender Id Field -->
        <div class="form-row">
                <!-- Gender -->
                <fieldset class="form-group col-md-4">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender_id" id="register_as_translator" value="1" required autofocus>
                                <label class="form-check-label" for="gender_id">
                                {{ __('Madame')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender_id" id="gender_mr" value="2" required>
                                <label class="form-check-label" for="gender_id">
                                {{ __('Monsieur')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender_id" id="gender_mrs" value="3" required>
                                <label class="form-check-label" for="gender_id">
                                {{ __('Mademoiselle')}}
                                </label>
                            </div>
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
                <input type="text" class="form-control" id="firstname" placeholder="{{ Auth::user()->firstname}}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="surname">{{ __('Nom de famille')}}</label>
                <input type="text" class="form-control" id="surname" placeholder="{{ Auth::user()->surname}}" readonly>
            </div>
            @if ($errors->has('gender_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gender_id') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="{{ Auth::user()->email}}" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" placeholder="{{ Auth::user()->name}}" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="address1">{{ __('Adresse (en deux parties si nécessaire)')}}</label>
            <input type="text" id="address1" placeholder="{{ __('Encodez votre adresse')}}" class="mb-3 form-control{{ $errors->has('address1') ? ' is-invalid' : '' }}" name="address1" value="{{ old('address1') }}" required autofocus>
            <input type="text" id="address2" placeholder="{{ __('Encodez la deuxième partie si nécessaire')}}" class="form-control{{ $errors->has('address2') ? ' is-invalid' : '' }}" name="address2" value="@if(old('address2')){{ old('address2') }}@endif" autofocus>
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
                <input type="text" id="postal_code" placeholder="{{ __('Code postal')}}" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ old('postal_code') }}" required autofocus>
                @if ($errors->has('postal_code'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('postal_code') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="city">{{ __('Ville')}}</label>
                <input type="text" id="city" placeholder="{{ __('Ville')}}" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>
                @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="state">{{ __('Province/Département')}}</label>
                <input type="text" id="state" placeholder="{{ __('Province/Département')}}" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" autofocus>
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
                name="country" placeholder="{{ Auth::User()->country_id }}" disabled>
            </div>
        </div>
        <!-- Secondaryemail + social Media -->
        <div class="form-row">
            <!-- Other mail -->
            <div class="form-group col-md-8">
                <label for="secondaryemail">{{ __('Adresse e-mail secondaire') }}</label>
                <input id="secondaryemail" type="text" class="form-control{{ $errors->has('secondaryemail') ? ' is-invalid' : '' }}" name="secondaryemail" value="{{ old('secondaryemail') }}" required>
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
                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
       

        <!-- Mobile Field -->
            <div class="form-group col-md-4">
                <label for="mobile">{{ __('Numéro de portable') }}</label>
                <input id="mobile" type="tel" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>
                @if ($errors->has('mobile'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('mobile') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @if(Auth::user()->register_as > '0' && Auth::user()->register_as < '4')
        <!-- Vat Field -->
        <div class="form-row">
            <div class="form-group col-md-6">
                @if(Auth::user()->register_as == '1')
                    <label for="VAT">{{ __('Numéro de TVA intracommunautaire de votre activité linguistique') }}</label>
                @endif
                @if(Auth::user()->register_as == '2')
                    <label for="VAT">{{ __('Numéro de TVA de votre entreprise') }}</label>
                @endif
                <input id="VAT" type="text" class="form-control{{ $errors->has('VAT') ? ' is-invalid' : '' }}" name="VAT" value="{{ old('VAT') }}" required>
                @if ($errors->has('VAT'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('VAT') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @endif


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
        <button type="submit" class="btn btn-primary">{{ __('Ajouter les données à mon profil.') }}</button>
        
        </form>
    </div>
</div>
@endsection
