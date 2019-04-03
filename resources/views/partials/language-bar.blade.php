<div id="languageBar" class="p-2 collapse border-bottom" aria-labelledby="selectedLanguageFlag">
    <ul id="flags" class="list-inline w-100 text-right mb-0 d-xs-inline-block">
        <li class="list-inline-item">
            <span class="d-none d-md-inline-block">
                <strong>@lang('interface.selectYourLanguage')</strong>
            </span>
        </li>  
        @foreach(config('app.locales') as $locale)
            @if($locale !== App::getLocale())
                <li class="list-inline-item">
                    <a class="text-light m-0 d-block" 
                    href="/setlocale/{{ $locale }}">
                        <img class="img-fluid" width="16" height="16" alt="{{ App::getLocale() }}"  src="{!! asset('img/flags/'.$locale.'.png') !!}" />
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>