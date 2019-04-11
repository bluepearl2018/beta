@isset($userOrganizations)
@php($o = 0)
@forelse($userOrganizations as $userOrganization)
<div class="row no-gutters mb-1 text-left">
    <div class="col-auto mr-2">
        <a href="{!! $userOrganization->organization->website !!}" 
            class="text-dark" target="_blank">
            {{ substr($userOrganization->organization->name, 0, 50) }}...
        </a>    
    </div>
    <div class="col-auto mr-2 ml-auto">
        @if($userOrganization->visibility_id == '1')
            <span class="badge badge-success">
                @lang('interface.visible')
            </span>
        @else
            <span class="badge badge-warning">
                @lang('interface.invvisible')
            </span>
        @endif
    </div>
    <div class="col-auto mr-2">
        @if($userOrganization->status_id == '1')
        <span class="badge badge-success">@lang('interface.active')</span>
        @else
        <span class="badge badge-warning">@lang('interface.inactive')</span>
        @endif
    </div>
    @if($userOrganization->user_id == Auth::User()->id)
    <div class="col-auto d-none d-md-block">
        <div class='btn-group'>
            <form id="organization_visibility_form{{$o}}" action="/profile/users-organizations/toggle-visibility" method="POST"> 
                @csrf
                <input id="inp_organization_vis_id{{$o}}" type="hidden" name="organization_id" value="{{ Crypt::encrypt($userOrganization->id) }}">
                <button type="submit" form="organization_visibility_form{{$o}}" role="button" class = "btn btn-default btn-sm">
                @if($userOrganization->visibility_id == 0)
                <i class="fa fa-eye"></i>
                @elseif($userOrganization->visibility_id == 1)
                <i class="fa fa-eye-slash"></i>
                @endif
                </button>
            </form>
            <form id="organization_status_form{{$o}}" action="/profile/users-organizations/toggle-status" method="POST"> 
                @csrf
                <input id="inp_organization_sta_id{{$o}}" type="hidden" name="organization_id" value="{{ Crypt::encrypt($userOrganization->id) }}">
                <button type="submit" form="organization_status_form{{$o}}" role="button" class = "btn btn-default btn-sm">
                        @if($userOrganization->status_id == 0)
                        <i class="fa fa-eye"></i>
                        @elseif($userOrganization->status_id == 1)
                        <i class="fa fa-eye-slash"></i>
                        @endif
                </button>
            </form>
        {!! Form::open(['route' => ['users-organizations.destroy', $userOrganization->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
        {!! Form::close() !!}
        </div>
    </div>
    @endif
</div>
@php($o++)
@empty
    @lang('interface.noItemsToDisplay')
@endforelse
@endisset