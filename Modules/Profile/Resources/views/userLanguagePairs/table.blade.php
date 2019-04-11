@if(isset($userLanguagePairs))
    @php($lp = 0)
    @forelse($userLanguagePairs as $userLanguagePair)
    <div class="row no-gutters mb-1 text-left">
        <div class="col-auto mr-2">
            {{ $userLanguagePair->sourcelanguage->name }}
        </div>
        <div class="col-auto mr-2">
            > {{ $userLanguagePair->targetlanguage->name }}
        </div>
        <div class="col-auto mr-2 ml-auto">
            @if($userLanguagePair->visibility_id == '1')
            <span class="badge badge-success">@lang('interface.visible')</span>
            @else
            <span class="badge badge-warning">@lang('interface.invisible')</span>
            @endif
        </div>
        <div class="col-auto mr-2">
            @if($userLanguagePair->status_id == '1')
            <span class="badge badge-success">@lang('interface.active')</span>
            @else
            <span class="badge badge-warning">@lang('interface.inactive')</span>
            @endif
        </div>
        @if($userLanguagePair->user_id == Auth::User()->id)
        <div class="col-auto">
            <div class='btn-group'>
                <form id="language_pair_visibility_form{{$lp}}" action="/profile/users-language-pairs/toggle-visibility" method="POST"> 
                    @csrf
                    <input id="inp_lang_pair_vis_id{{$lp}}" type="hidden" name="language_pair_id" value="{{ Crypt::encrypt($userLanguagePair->id) }}">
                    <button type="submit" role="button" form ="language_pair_visibility_form{{$lp}}" class = "btn btn-default btn-sm">
                    @if($userLanguagePair->visibility_id == 0)
                    <i class="fa fa-eye"></i>
                    @elseif($userLanguagePair->visibility_id == 1)
                    <i class="fa fa-eye-slash"></i>
                    @endif
                    </button>
                </form>
                <form id="language_pair_status_form{{$lp}}" action="/profile/users-language-pairs/toggle-status" method="POST"> 
                    @csrf
                    <input id="inp_lang_pair_sta_id{{$lp}}" type="hidden" name="language_pair_id" value="{{ Crypt::encrypt($userLanguagePair->id) }}">
                    <button type="submit" role="button" form ="language_pair_status_form{{$lp}}" class = "btn btn-default btn-sm">
                            @if($userLanguagePair->status_id == 0)
                            <i class="fa fa-eye"></i>
                            @elseif($userLanguagePair->status_id == 1)
                            <i class="fa fa-eye-slash"></i>
                            @endif
                    </button>
                </form>
                {!! Form::open(['route' => ['users-language-pairs.destroy', $userLanguagePair->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
        @endif
    </div>
    @php($lp++)
    @empty
        @lang('interface.noItemsToDisplay')
    @endforelse
@endif