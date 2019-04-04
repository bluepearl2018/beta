@extends('layouts.contacts')
@section('content')
@include('flash::message')
<div class="container">
    <h1 class="mt-3">
        <i class="fa fa-envelope"></i>
        <strong>@lang('contacts.contactUser')&nbsp;: {{ $recipient->firstname }} {{ $recipient->surname }}</strong>
    </h1>
    <p class="lead">
        @lang('contacts.contactUserLead')
    </p>
    <form id="send-message" action="{{ route('send-message-to-user') }}" method="POST">
        @csrf
        <input type="hidden" name="check_4" value="{{ Crypt::encrypt($recipient->email) }}" required />
        <input type="hidden" name="check_5" value="{{ Crypt::encrypt($recipient->name) }}" required />
        <input type="text" name="subject" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }} mb-2" 
        placeholder="@lang('contacts.yourEmailSubject')" required />
        @if ($errors->has('subject'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('subject') }}</strong>
            </span>
        @endif
        <textarea name="body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }} mb-2" rows="12" 
            placeholder="@lang('contacts.yourEmailBody')" required>
        </textarea>
        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
        {{-- TODO 
        <div class="form-group">
            CAPTCHA
        </div>--}}
        <button type="submit" form="send-message" role="button" class="btn btn-primary">
                @lang('contacts.sendMessage')
        </button>
    </form>
</div>
@endsection
@section('script')
    {{--
    <script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('reCAPTCHA_site_key', {action: 'homepage'}).then(function(token) {
            ...
        });
    });
    </script>
    --}}
@endsection