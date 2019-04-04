<div class="form-check">
    <input type="checkbox" name="acceptGDPR" class="form-check-input{{ $errors->has('acceptGDPR') ? ' is-invalid' : '' }}" id="gdpr" required />
    <label class="form-check-label" for="gdpr">@lang('contacts.mailGDPR')</label>
    @if ($errors->has('acceptGDPR'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('acceptGDPR') }}</strong>
        </span>
    @endif
</div>