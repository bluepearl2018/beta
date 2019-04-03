<a class="list-inline-item mr-2" href="#" 
id="selectedLanguageFlag" role="button" 
data-toggle="collapse" data-target="#languageBar" aria-expanded="false" 
style="color:gainsboro !important; padding:0.45rem 0.1rem !important" >
	<img width="locale -a" height="16" alt="{{ session('locale') }}" 
	src="{{ asset('/img/flags/'.str_replace('_', '-', app()->getLocale()).'.png') }}" />
</a>