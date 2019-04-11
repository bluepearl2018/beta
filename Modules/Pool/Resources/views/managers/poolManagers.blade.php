<div class="card mb-3">
    <h2 class="card-header text-light" style="background-color:teal">
        @lang('pool.poolManagersForPool') "{{ $poolData->name }}"
    </h2>
    <div class="card-body">
        <p class="lead">@lang('pool.poolManagersLead')</p>
        @php($configServiceLocales = \Config::get('app.serviceLocales'))
        @php($officialSourceLanguages = \Modules\UiTables\Entities\Sourcelanguage::whereIn('code', $configServiceLocales)->get())
        @php($officialSourceLanguagesId = \Modules\UiTables\Entities\Sourcelanguage::whereIn('code', $configServiceLocales)->pluck('id')->toArray())
        @if(count($managersForCurrentPool->whereIn('language_id', $officialSourceLanguagesId)) > 0)
            <select class="form-control mb-3 bg-secondary" id="pmSelFilter">
                <option value="">@lang('pool.checkForAvailableNativePm')</option>
                @forelse($managersForCurrentPool->whereIn('language_id', $officialSourceLanguagesId) as $serviceLocales)
                    <option value="{{$serviceLocales->language->region}}">
                        {{$serviceLocales->language->name}}
                    </option>
                    @empty
                @endforelse
            </select>
        @endif
        <div class="container-fluid m-0 p-0" id="tabsPm">
            <div class="row-fluid">
                    @php($pm = 0)
                    @forelse($managersForCurrentPool->whereIn('language_id', $officialSourceLanguagesId) as $poolManager)
                        @if(in_array($poolManager->language_id, $officialSourceLanguagesId))
                            <div id="pmFor{{$poolManager->language->region}}" class="row no-gutters m-0 p-0 
                                group group{{$poolManager->language->region}}">
                                <h5 class="col-auto mr-auto">
                                    <form id="showMember{{$pm}}" method="POST" action="{{ route('show-public-profile') }}">
                                        @csrf
                                        <span class="col"><img height="16" width="16" alt="{{ $poolManager->language->code }}" 
                                        src="{!! asset('img/flags/'.$poolManager->language->code.'.png') !!}" /></span>
                                        <input id="userPool{{$pm}}" type="hidden" name="user_pool" value="{{ Crypt::encrypt($poolData->code) }}" />
                                        <input id="input{{$pm}}" type="hidden" name="user_request" value="{{ Crypt::encrypt($poolManager->manager->id) }}" />
                                        <span class="col">
                                            {{ $poolManager->manager->firstname }}
                                        </span>
                                        <span class="col">
                                            {{ $poolManager->manager->surname }}
                                        </span>
                                        <span class="col">
                                            ({{ $poolManager->language->name }})
                                        </span>
                                    </form>
                                </h5>
                                <div class="col-auto ml-auto">
                                        <button role="button" class="bg-white p-0 m-0" style="border:none" 
                                        form="showMember{{$pm}}" type="submit">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                </div>
                            </div>
                        @endif
                        @php($pm++)
                        @empty
                            <div class="card mb-3">
                                <h5 class="card-header text-light p-1" style="background-color:tomato ">
                                    <span class="fa fa-bolt mr-2 d-block"></span>
                                    @lang('pool.becomeAFirstJoiner')
                                </h5>
                                <p class="px-2">
                                    <small>
                                        @lang('pool.becomeAFirstJoinerExplanation')
                                    </small>
                                </p>
                            </div>
                    @endforelse
            </div>
            
        </div>
    </div>
</div>
<div class="card mb-3">
        <h2 class="card-header bg-primary">@lang('pool.becomeAPoolManagerInThisSpecializedField')</h2>
        @php($pmTarget = count($officialSourceLanguages))
        @php($pmReachedTarget = 100/count($officialSourceLanguages))
        <div class="card-body">
            <p>@lang('pool.becomeAPoolManagerForYourSpecializedFieldExplanation')</p>
            @if(count($managersForCurrentPool->whereIn('language_id', $officialSourceLanguagesId)) > 0)
                <div class="progress p-0 mt-2" style="height:15px; background-color:tomato" >
                    @forelse($managersForCurrentPool->whereIn('language_id', $officialSourceLanguagesId) as $poolManager)
                        <div class="progress-bar progress-bar bg-success p-0" role="progressbar" style="width: {{$pmReachedTarget}}%" aria-valuenow="{{$pmReachedTarget}}" aria-valuemin="0" aria-valuemax="100"></div>
                        @php($pmReachedTarget++)
                    @empty
                    @endforelse
                </div>
            @endif
        </div>
</div>
<table class="table container-fluid m-0 p-0">
@foreach($officialSourceLanguages as $case)
    @forelse($managersForCurrentPool->where('language_id', $case->id) as $poolManager)
    @empty
        <tr class="row-fluid">
            <td>
                @lang('pool.poolManagerWanted')<br><strong>(@lang('pool.languageName')&nbsp;: {{ $case->name }})</strong>
            <td>
            <td>
                <form id="applyForThisPool{{$case->name}}" method="POST" action="/contact/apply">
                    @csrf
                    <input type="hidden" value="{{$case->region}}-{{$poolData->name}}" />
                    <i class="btn btn-primary py-1 fa fa-envelope"></i>
                </form>
            </td>
        </tr>
    @endforelse
@endforeach 
</table>

@section('script')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(function() {
                $('#pmSelFilter').change(function(){
                    $('.group').hide();
                    if ( this.value == ''){
                        $('.group').show();
                    }
                    @if(isset($managersForCurrentPool) && count($managersForCurrentPool) > 0)
                        @foreach($managersForCurrentPool as $poolManager)
                            else if ( this.value == '{{$poolManager->language->region}}'){
                                $(".group{{$poolManager->language->region}}").show();
                            }
                        @endforeach
                    @endif
                });
                
            });
        });
    </script> 
@endsection