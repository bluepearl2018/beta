@if(isset($userPools))
@php($p = 0)
@forelse($userPools as $userPool)
<div class="row container-fluid no-gutters m-0 clearfix py-1 text-left">
    
    <div class="col-auto mr-2">
        <a class="text-dark" href="/pools/{{ $userPool->pool->parentPool['slug'] }}/{{ $userPool->pool->slug }}">
            {{ $userPool->pool->name }}
        </a>
    </div>
    <div class="col-auto mr-2 ml-auto">
        @if($userPool->visibility_id == '1')
        <span class="badge badge-success">@lang('interface.visible')}}</span>
        @else
        <span class="badge badge-warning">@lang('interface.invisible')}}</span>
        @endif
    </div>
    <div class="col-auto mr-2">
        @if($userPool->status_id == '1')
        <span class="badge badge-success">@lang('interface.active')}}</span>
        @else
        <span class="badge badge-warning">@lang('interface.inactive')}}</span>
        @endif
    </div>
    @if($userPool->user_id == Auth::User()->id)
    <div class="col-auto">
        <div class='btn-group'>
            <form id="pool_visibility_form{{$p}}" action="/profile/users-pools/toggle-visibility" method="POST"> 
                @csrf
                <input id="inp_pool_vis_id{{$p}}" type="hidden" name="pool_id" value="{{ Crypt::encrypt($userPool->id) }}">
                <button type="submit" form="pool_visibility_form{{$p}}" role="button" class = "btn btn-default btn-sm">
                @if($userPool->visibility_id == 0)
                <i class="fa fa-eye"></i>
                @elseif($userPool->visibility_id == 1)
                <i class="fa fa-eye-slash"></i>
                @endif
                </button>
            </form>
            <form id="pool_status_form{{$p}}" action="/profile/users-pools/toggle-status" method="POST"> 
                @csrf
                <input id="inp_pool_sta_id{{$p}}" type="hidden" name="pool_id" value="{{ Crypt::encrypt($userPool->id) }}">
                <button type="submit" form="pool_status_form{{$p}}" role="button" class = "btn btn-default btn-sm">
                        @if($userPool->status_id == 0)
                        <i class="fa fa-eye"></i>
                        @elseif($userPool->status_id == 1)
                        <i class="fa fa-eye-slash"></i>
                        @endif
                </button>
            </form>
            {!! Form::open(['route' => ['users-pools.destroy', $userPool->id], 'method' => 'delete']) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @endif
</div>
@php($p++)
@empty
    @lang('interface.noItemsToDisplay')
@endforelse
@endif