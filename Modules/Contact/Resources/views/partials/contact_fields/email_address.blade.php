<div class="form-group">
    <label id="sendFromEmail-label" for="sendFromEmail">@lang('contacts.emailAddress')</label>
    <input name="email"
    type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
    id="sendToEmail" placeholder="@lang('contacts.eg') my.address@domain.xyz" aria-describedby="emailHelp" required />
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>