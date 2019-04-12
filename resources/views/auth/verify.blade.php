@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.verifyMailTitle')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('auth.freshVerificationLinkSentToYourMailAddress')
                        </div>
                    @endif

                    @lang('auth.beforeProceedingCheckYourEmailForVerificationLink')
                    @lang('auth.notReceivedYourEmail'), <a href="{{ route('verification.resend') }}">@lang('clickHereToRequestAnother')</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
