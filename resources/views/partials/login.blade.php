<div class="card">
    <div class="card-header">
        @lang('interface.login')
    </div>
    <div class="card-body py-1">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row mb-0">
                <label for="email" class="col-sm-12 col-form-label">
                    @lang('interface.mailAddress')
                </label>
                <div class="col-sm-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-12 col-form-label">
                    @lang('interface.password')
                </label>

                <div class="col-sm-12">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" required>
                        <label class="form-check-label" for="remember">
                            <a href="/pages/about/general-terms">@lang('interface.iAcceptGeneralTerms')</a>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-1">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mb-2 mr-2">
                        @lang('interface.login')
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-outline-secondary mb-2 mr-2" href="{{ route('password.request') }}">
                            @lang('interface.forgotPassword')
                        </a>
                    @endif
                    @if (Route::has('login'))
                        <a class="btn btn-outline-secondary mb-2 mr-2" href="{{ route('register') }}">
                            @lang('interface.register')
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>