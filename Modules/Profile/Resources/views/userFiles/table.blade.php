@isset($userFiles)
@php($file = 0)

@forelse($userFiles as $userFile)
<div class="row no-gutters mb-1 text-left">
    <div class="col-auto mr-2">
        @if($userFile->file_extension)
        <form id="downloadUserFile{{$file}}" method="POST" action="{{route('download-user-file')}}">
            @csrf
            <input type="hidden" name="userFileToDownload" value="{{ Crypt::encrypt($userFile->id) }}" />
            <button class="btn btn-primary" role="button" form="downloadUserFile{{$file}}" type="submit">
                {{ $userFile->file_name }}
            </button>
        </form>
        @endif
    </div>
    <div class="col-auto mr-2 ml-auto">
        @if($userFile->visibility_id == '1')
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
        @if($userFile->status_id == '1')
            <span class="badge badge-success">
                @lang('interface.active')
            </span>
        @else
            <span class="badge badge-warning">
                @lang('interface.inactive')
            </span>
        @endif
    </div>
    @if($userFile->user_id == Auth::User()->id)
    <div class="col-auto">
        <div class='btn-group'>
            <form id="file_visibility_form{{$file}}" action="/zones/users/my-profile/users-files/toggle-visibility" method="POST"> 
                @csrf
                <input id="inp_file_vis_id{{$file}}" type="hidden" name="file_id" value="{{ Crypt::encrypt($userFile->id) }}">
                <button type="submit" form="file_visibility_form{{$file}}" role="button" class = "btn btn-default btn-sm">
                @if($userFile->visibility_id == 0)
                <i class="fa fa-eye"></i>
                @elseif($userFile->visibility_id == 1)
                <i class="fa fa-eye-slash"></i>
                @endif
                </button>
            </form>
            <form id="file_status_form{{$file}}" action="/zones/users/my-profile/users-files/toggle-status" method="POST"> 
                @csrf
                <input id="inp_file_sta_id{{$file}}" type="hidden" name="file_id" value="{{ Crypt::encrypt($userFile->id) }}">
                <button type="submit" form="file_status_form{{$file}}" role="button" class = "btn btn-default btn-sm">
                        @if($userFile->status_id == 0)
                        <i class="fa fa-eye"></i>
                        @elseif($userFile->status_id == 1)
                        <i class="fa fa-eye-slash"></i>
                        @endif
                </button>
            </form>
            {!! Form::open(['route' => ['users-files.destroy', $userFile->id], 'method' => 'delete']) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @endif
</div>
@php($file++)
@empty
    @lang('interface.noItemsToDisplay')
@endforelse
@endisset