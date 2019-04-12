@if(! Auth::User()->hasRole('premium'))
    <h6 class="border-bottom">
        @lang('account.preRegisterAsPremiumTranslator')
    </h6>
    <p>@lang('account.preRegisterAsPremiumTranslatorWhy')</p>
@endif