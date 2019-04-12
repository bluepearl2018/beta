@extends('layouts.app')

@section('content')
	<h1 class="border-bottom">
	<strong>@lang('interface.registerTitle')</strong>
	</h1>
	<p class="lead">
        @lang('interface.registerLead')
	</p>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <!-- Mother language -->
                <div class="form-group row">
                    <label for="mother_language" class="col-md-4 col-form-label text-md-right">
                        @lang('interface.motherLanguage')
                    </label>
                    
                    <div class="col-md-6">
                        <select id="mother_language" class="form-control{{ $errors->has('mother_language') ? ' is-invalid' : '' }} mb-2" name="mother_language" value="{{ old('mother_language') }}" required autofocus>
                            @php($sourcelanguages = Sourcelanguage::orderBy('name', 'asc')->get())
                            <option value="" disabled selected>@lang('interface.selectYourLanguage')</option>
                            @foreach($sourcelanguages as $language)
                                <option value="@if(old($language->id)){{ old($language->id) }}@else{{ $language->id }} @endif" @if(old($language->id))selected @endif required>{{ $language->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('mother_language'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mother_language') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">
                        @lang('interface.chooseUserName')
                    </label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">
                        @lang('interface.mailAddress')
                    </label>

                    <div class="col-md-6">
                        @if(isset($_REQUEST['register_email']) && $_REQUEST['register_email'])
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $_REQUEST['register_email'] }}" required>
                            @else
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @endif
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Firstname -->
                
                <div class="form-group row">
                    <label for="firstname" class="col-md-4 col-form-label text-md-right">
                        @lang('interface.yourFirstName')
                    </label>
                    
                    <div class="col-md-6">
                        @if(isset($_REQUEST['firstname']) && $_REQUEST['firstname'])
                            <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ $_REQUEST['firstname'] }}" required>
                            @else
                            <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required>
                        @endif
                        @if ($errors->has('firstname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    
                    </div>
                </div>
                <!-- Surname -->

                <div class="form-group row">
                    <label for="surname" class="col-md-4 col-form-label text-md-right">
                        @lang('interface.SurName')
                    </label>
                    <div class="col-md-6">
                        @if(isset($_REQUEST['surname']) && $_REQUEST['surname'])
                            <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $_REQUEST['surname'] }}" required>
                            @else
                            <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required>
                        @endif
                        @if ($errors->has('surname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                        @endif

                    </div>
                
                </div>

                <!-- Country_id -->
                <div class="form-group row">
                    <label for="country_id" class="col-md-4 col-form-label text-md-right">
                        @lang('interface.country')
                    </label>
                    
                    <div class="col-md-6">
                        <select id="country_id" class="form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }} mb-2" name="country_id" required>
                            <option value="" selected disabled>@lang('interface.selectYourCountry')</option>
                            @foreach(\App\Models\Country::orderBy('name_fr', 'asc')->get() as $country)
                                <option value="@if(old($country->id)){{ old($country->id) }}@else{{ $country->id }} @endif" @if(old($language->id))selected @endif required>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('country_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('country_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="VAT" class="col-md-4 col-form-label text-md-right">
                        @lang('interface.VAT')
                    </label>

                    <div class="col-md-6">
                        <input id="VAT" type="text" class="form-control{{ $errors->has('VAT') ? ' is-invalid' : '' }}" name="VAT" value="{{ old('VAT') }}" autofocus>

                        @if ($errors->has('VAT'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('VAT') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Register as -->
                <div class="form-group row">
                    
                    <label for="register_as" class="col-md-4 col-form-label text-md-right">
                        @lang('interface.registerAs')
                    </label>
                    
                    <fieldset class="form-group col-md-6">
                        <div class="">
                            <div class="form-row align-items-center">
                                <div class="col-12">
                                    @php($registerAsArray = array('buyer', 'translator', 'dtper', 'academic', 'developer', 'proorg'))
                                    @foreach(\App\Models\Role::whereIn('name', $registerAsArray)->orderBy('id', 'asc')->select('id', 'title', 'description')->get() as $role)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="register_as" 
                                        id="register_as_{{ $role->id }}" value="{{ $role->id }}" required>
                                        <label class="form-check-label" for="register_as_{{ $role->id }}">
                                            {{ $role->title }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                @if ($errors->has('register_as'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('register_as') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </fieldset>
                    </div>
                    
                    <!-- password -->
                    <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">
                        @lang('interface.chooseAPassword')
                    </label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- password-confirm -->
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                            @lang('interface.confirmPassword')
                        </label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                    </div>

                    <!-- Accept terms -->
                    <div class="container mb-2 ml-2 mr-2 form-check text-center">
                        
                        <input type="checkbox" class="form-check-input" id="general_terms" name="general_terms" value="1" required>
                        <label  class="col-md-6 col-form-check-label text-md-right" for="general_terms">@lang('interface.iAcceptGeneralTerms') (<a href="/eutranet/general-terms">@lang('interface.moreAbout')</a>)</label>
                        
                    </div>
                    
                    <!-- password-confirm -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                @lang('interface.goOn')
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
