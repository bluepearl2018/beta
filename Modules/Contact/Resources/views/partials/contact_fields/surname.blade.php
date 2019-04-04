<div class="form-group">
    <label id="surname-label" for="surname">@lang('contacts.surname')</label>
    <input name="surname" value="@auth{{Auth::User()->surname}}@endauth" @auth readonly @endauth type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" 
    id="surname" placeholder="@lang('contacts.surname')" aria-describedby="surname-label" required />
    @if ($errors->has('surname'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('surname') }}</strong>
        </span>
    @endif
</div>