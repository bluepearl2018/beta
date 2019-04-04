<div class="form-group">
    <label id="subject-label" for="subject">@lang('contacts.mailSubject')</label>
    <input type="text" id="subject" name="subject"  class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}"
        placeholder="@lang('contacts.yourEmailSubject')"  required />
    @if ($errors->has('subject'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('subject') }}</strong>
        </span>
    @endif
</div>