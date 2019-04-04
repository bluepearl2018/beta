<div class="form-group">
    <label id="firstname-label" for="firstname">@lang('contacts.firstname')</label>
    <input name="firstname" type="text" 
    value="@auth{{Auth::User()->firstname}}@endauth" @auth readonly @endauth
    class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" 
    id="firstname" placeholder="@lang('contacts.firstname')" aria-describedby="firstname-label" required />
    @if ($errors->has('firstname'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('firstname') }}</strong>
        </span>
    @endif
</div>