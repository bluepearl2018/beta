@if(isset($userTools))
    @php($t = 0)
    @forelse($userTools as $userTool)
    <div class="row no-gutters container-fluid m-0 my-1 p-0 text-left">
        <div class="col-auto mr-2">
            <a href="{!! $userTool->tool->www !!}" class="text-dark" target="_blank">
                    @if($userTool->tool_id == '1')
                    XTM
                    @elseif($userTool->tool_id == '2')
                    Memsource
                    @elseif($userTool->tool_id == '3')
                    memoQ
                    @elseif($userTool->tool_id == '4')
                    Wordfast
                    @elseif($userTool->tool_id == '5')
                    Déjà Vu
                    @elseif($userTool->tool_id == '6')
                    Transit
                    @elseif($userTool->tool_id == '7')
                    OmegaT
                    @elseif($userTool->tool_id == '8')
                    MadCapLingo
                    @elseif($userTool->tool_id == '9')
                    SDL Trados
                    @elseif($userTool->tool_id == '10')
                    MateCat
                    @endif
            </a>    
        </div>
        <div class="col-auto mr-2 ml-auto">
            @if($userTool->visibility_id == '1')
                <span class="badge badge-success">
                    @lang('interface.visible')
                </span>
            @else
            <span class="badge badge-warning">
                @lang('interface.invisible')
            </span>
            @endif
        </div>
        <div class="col-auto mr-2">
            @if($userTool->status_id == '1')
                <span class="badge badge-success">
                    @lang('interface.active')
                </span>
            @else
                <span class="badge badge-warning">
                    @lang('interface.inactive')
                </span>
            @endif
        </div>
        @if($userTool->user_id == Auth::User()->id)
        <div class="col-auto">
            <div class='btn-group'>
                <form id="tool_visibility_form{{$t}}" action="/profile/users-tools/toggle-visibility" method="POST"> 
                    @csrf
                    <input id="inp_tool_vis_id{{$t}}" type="hidden" name="tool_id" value="{{ Crypt::encrypt($userTool->id) }}">
                    <button type="submit" form="tool_visibility_form{{$t}}" role="button" class = "btn btn-default btn-sm">
                    @if($userTool->visibility_id == 0)
                    <i class="fa fa-eye"></i>
                    @elseif($userTool->visibility_id == 1)
                    <i class="fa fa-eye-slash"></i>
                    @endif
                    </button>
                </form>
                <form id="tool_status_form{{$t}}" action="/profile/users-tools/toggle-status" method="POST"> 
                    @csrf
                    <input id="inp_tool_sta_id{{$t}}" type="hidden" name="tool_id" value="{{ Crypt::encrypt($userTool->id) }}">
                    <button type="submit" form="tool_status_form{{$t}}" role="button" class = "btn btn-default btn-sm">
                            @if($userTool->status_id == 0)
                            <i class="fa fa-eye"></i>
                            @elseif($userTool->status_id == 1)
                            <i class="fa fa-eye-slash"></i>
                            @endif
                    </button>
                </form>
                {!! Form::open(['route' => ['users-tools.destroy', $userTool->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
        @endif
    </div>
    @php($t++)
    @empty
        @lang('interface.noItemsToDisplay')
    @endforelse
@endif