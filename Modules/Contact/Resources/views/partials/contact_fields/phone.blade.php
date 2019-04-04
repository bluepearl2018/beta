<div class="form-group">
    <label id="phone-label" for="phone">@lang('contacts.phone')</label>
    <input name="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" 
    id="phone" placeholder="@lang('contacts.eg') +352.12456547" aria-describedby="phone-label" required />
    @if ($errors->has('phone'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>