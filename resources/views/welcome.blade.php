
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@include('components.head')
	<body>
      <div id="app" class="container-fluid m-0 p-0"  style="background: url('/uploads/images/science-3334826_1920.jpg') no-repeat; background-size:cover; background-position:center bottom; min-height:860px">
          <header class="d-flex row container-fluid m-0 p-0">
              @include('components.header')
          </header>
          <main class="d-flex container-fluid m-0 p-0 h-100">
                <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 text-center rounded px-3 my-3 mt-md-5" style="min-height:280px; background-color:rgba(158, 148, 120, 0.9);">
                  <h1 class="mt-5">
                    <span class="text-dark">
                      @lang('splash.baseLine')
                    </span>
                  </h1>
                  <h2 class="w-75 mx-auto mb-2 font-weight-normal">
                    <span class="text-light">
                      @lang('splash.sloganSub')
                    </span>
                  </h2>
                  <div class="pt-1 mt-4">
                    <div id="languageBarSplash" class="p-2 " aria-labelledby="selectedLanguageFlag">
                      <ul id="flags" class="mx-auto list-inline w-100 text-center mb-0 d-md-inline-block">
                        @foreach(config('app.locales') as $locale)
                          @if($locale != session('locale'))
                            <li class="list-inline-item">
                              <a class="text-light m-0 d-block" 
                              href="/setlocale/{{ $locale }}" title="{{$locale}}">
                                <img class="img-fluid" width="16" height="16" 
                                alt="{{ $locale }}"  
                                src="{!! asset('img/flags/' . $locale . '.png') !!}" />
                              </a>
                            </li>
                          @endif
                        @endforeach
                      </ul>
                    </div>
                    @if(is_null(app()->getLocale()))
                      <div class="d-inline-block mx-auto p-0 form-group">
                        <span>@lang('splash.selectYourLanguage') </span>
                      </div>
                    @elseif(!is_null(app()->getLocale()))
                      <div class="d-inline-block mx-auto p-0 form-group">
                        <a href="welcome" class="btn btn-outline-secondary text-light my-3 mx-1">
                          @lang('splash.startVisit')
                        </a>
                        <a href="{{route('register')}}" 
                        class="btn btn-outline-secondary text-light my-3 mx-1">
                          @lang('splash.register')
                        </a>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="offset-md-1 col-sm-10 offset-md-2 col-md-8" 
                style="min-height:336px">
                </div>
          </main>
          @include('components.footer')
      </div>
      @yield('script')
	</body>
</html>