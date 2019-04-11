@isset($userCertificates)
@php($certif = 0)

@forelse($userCertificates as $userCertificate)
<div class="row no-gutters mb-1 text-left">
    <div class="col-auto mr-2">
        <form id="downloadUserFile{{$certif}}" method="POST" action="{{route('download-user-certificate')}}">
            @csrf
            <input type="hidden" name="userCertificateToDownload" value="{{ Crypt::encrypt($userCertificate->id) }}" />
            <button class="btn btn-primary" role="button" form="downloadUserFile{{$certif}}" type="submit">
                {{ $userCertificate->file_name }}
            </button>
        </form>
    </div>
    <div class="col-auto mr-2 ml-auto">
        @if($userCertificate->visibility_id == '1')
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
        @if($userCertificate->status_id == '1')
            <span class="badge badge-success">
                @lang('interface.active')
            </span>
        @else
            <span class="badge badge-warning">
                @lang('interface.inactive')
            </span>
        @endif
    </div>
    @if($userCertificate->user_id == Auth::User()->id)
    <div class="col-auto">
        <div class='btn-group'>
            <form id="certificate_visibility_form{{$certif}}" action="/profile/users-certificates/toggle-visibility" method="POST"> 
                @csrf
                <input id="inp_certificate_vis_id{{$certif}}" type="hidden" name="certificate_id" value="{{ Crypt::encrypt($userCertificate->id) }}">
                <button type="submit" form="certificate_visibility_form{{$certif}}" role="button" class = "btn btn-default btn-sm">
                @if($userCertificate->visibility_id == 0)
                <i class="fa fa-eye"></i>
                @elseif($userCertificate->visibility_id == 1)
                <i class="fa fa-eye-slash"></i>
                @endif
                </button>
            </form>
            <form id="certificate_status_form{{$certif}}" action="/profile/users-certificates/toggle-status" method="POST"> 
                @csrf
                <input id="inp_certificate_sta_id{{$certif}}" type="hidden" name="certificate_id" value="{{ Crypt::encrypt($userCertificate->id) }}">
                <button type="submit" form="certificate_status_form{{$certif}}" role="button" class = "btn btn-default btn-sm">
                        @if($userCertificate->status_id == 0)
                        <i class="fa fa-eye"></i>
                        @elseif($userCertificate->status_id == 1)
                        <i class="fa fa-eye-slash"></i>
                        @endif
                </button>
            </form>
            {!! Form::open(['route' => ['users-certificates.destroy', $userCertificate->id], 'method' => 'delete']) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @endif
</div>
@php($certif++)
@empty
    @lang('interface.noItemsToDisplay')
@endforelse
@endisset