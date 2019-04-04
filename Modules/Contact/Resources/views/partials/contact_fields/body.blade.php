<div class="form-group">
    <label id="message-label" for="message">@lang('contacts.mailMessage')</label>
    <textarea id="message" rows="5" type="text" 
    class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" 
    name="body" required></textarea>
    @if ($errors->has('body'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('body') }}</strong>
        </span>
    @endif
</div>