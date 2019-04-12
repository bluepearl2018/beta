<div class="card mb-3">
    <h6 class="card-header bg-secondary">@lang('contributions.interfaceTranslation')</h6>
    <div class="card-body">
        <p>@lang('contributions.interfaceTranslationExplanation')</p>
        @if(Auth::User()->hasRole('contributor'))
            <a href="/contributions/interface-translation" class="btn btn-primary">@lang('contributions.interfaceTranslation')</a>
        @else
            <a href="/pages/contributions/become-a-contributor" class="btn btn-primary">@lang('contributions.becomeAContributor')</a>
        @endif
    </div>
</div>