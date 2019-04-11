@isset($userServices)
@php($serv = 0)
@forelse($userServices as $userService)
<div class="row no-gutters mb-1 text-left">
    <div class="col-auto mr-2">
        {{ $userService->service->name }}
    </div>
    <div class="col-auto mr-2 ml-auto">
        <span class="badge badge-warning text-dark align-middle">min {{ $userService->min_rate }} €/h</span>
    </div>
    <div class="col-auto mr-2">
        <span class="badge badge-dark text-light align-middle">max {{ $userService->max_rate }} €/h</span>
    </div>
    <div class="col-auto mr-2">
        @if($userService->visibility_id == '1')
        <span class="badge badge-success align-middle">{{ __('Visible')}}</span>
        @else
        <span class="badge badge-warning align-middle">{{ __('Invisible')}}</span>
        @endif
    </div>
    <div class="col-auto mr-2">
        @if($userService->status_id == '1')
        <span class="badge badge-success align-middle">{{ __('Active')}}</span>
        @else
        <span class="badge badge-warning align-middle">{{ __('Désactivée')}}</span>
        @endif
    </div>
    @if($userService->user_id == Auth::User()->id)
    <div class="col-auto">
        <div class='btn-group'>
            <form id="serv_visibility_form{{$serv}}" action="/zones/users/my-profile/users-services/toggle-visibility" method="POST"> 
                @csrf
                <input id="inp_serv_vis_id{{$serv}}" type="hidden" name="service_id" value="{{ Crypt::encrypt($userService->id) }}">
                <button type="submit" form="serv_visibility_form{{$serv}}" role="button" class = "btn btn-default btn-sm">
                @if($userService->visibility_id == 0)
                <i class="fa fa-eye"></i>
                @elseif($userService->visibility_id == 1)
                <i class="fa fa-eye-slash"></i>
                @endif
                </button>
            </form>
            <form id="serv_status_form{{$serv}}" action="/zones/users/my-profile/users-services/toggle-status" method="POST"> 
                @csrf
                <input id="inp_serv_sta_id{{$serv}}" type="hidden" name="service_id" value="{{ Crypt::encrypt($userService->id) }}">
                <button type="submit" form="serv_status_form{{$serv}}" role="button" class = "btn btn-default btn-sm">
                        @if($userService->status_id == 0)
                        <i class="fa fa-eye"></i>
                        @elseif($userService->status_id == 1)
                        <i class="fa fa-eye-slash"></i>
                        @endif
                </button>
            </form>
            {!! Form::open(['route' => ['users-services.destroy', $userService->id], 'method' => 'delete']) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @endif
</div>
@php($serv++)
@empty
    @lang('interface.noItemsToDisplay')
@endforelse
@endisset