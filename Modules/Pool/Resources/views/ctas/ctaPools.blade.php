
@auth
    @if(count($managersForCurrentPool) < $countLocales && Auth::User()->hasRole('translator'))
        <div class="card">
            <div class="card-header bg-primary text-light">
                <small>@lang('pool.becomeAPoolManager')</small>
            </div>
            <div class="card-body">
                @lang('pool.becomeAPoolManagerExplanation')
            </div>
            @auth
                <form id="applyToBecomeAPoolManagerFrm" method="POST" class="card-footer bg-secondary p-0" action="{{ route('manage-this-pool') }}">
                    @csrf
                    <input type="hidden" name="candidate" value="{{Crypt::encrypt('Auth::User()->id')}}" />
                    <button class="btn-sm btn" type="submit" role="button" form="applyToBecomeAPoolManagerFrm">
                        @lang('pool.applyForThisPool')
                    </button>
                </form>
            @endauth
        </div>
    @endif
    @php($officialSourceLanguages = \Modules\UiTables\Entities\Sourcelanguage::select('code', 'name')->get())
    @php($configLocales = \Config::get('app.serviceLocales'))
    <div class="card">
        <div class="card-header bg-secondary">
            @lang('interface.eutranetIsLookingForNativePoolManagers')
        </div>
        <div class="card-body d-flex row flex-row">
            @foreach($officialSourceLanguages->whereIn('code', $configLocales) as $k => $stakes)
                <button class="btn btn-sm bg-secondary">{{ $stakes['name'] }}</button>
            @endforeach
        </div>
    </div>
@endauth