@if(isset($userSocialmedias))
    @php($m = 0)
    @forelse($userSocialmedias as $userSocialmedia)
    <div class="row no-gutters mb-1">
        <div class="col-md-1">
        @if($userSocialmedia->socialmedia_id == '1')
        <i class="fab fa-linkedin"></i>
        @endif
        @if($userSocialmedia->socialmedia_id == '2')
        <i class="fab fa-facebook"></i>
        @endif
        @if($userSocialmedia->socialmedia_id == '3')
        <i class="fab fa-twitter"></i>
        @endif</div>
        <div class="col-md-1">
            <?php // TODO : validate URL to check if Socialmedia page exists 
                // if(! @ file_get_contents($userSocialmedia->socialmedia['url'].'/'.$userSocialmedia->account)){
                // echo 'path doesn\'t exist';
                // }
            ?>
            @if(!is_null($userSocialmedia->account))
            <a href="{{ $userSocialmedia->socialmedia['url'] }}{{ $userSocialmedia->account }}" target="_blank">
                <span class="fa fa-globe text-success"></span>
            </a>
            @elseif(is_null($userSocialmedia->account))
                <span class="fa fa-circle text-exclamation-triangle"></span>
            @endif
        </div>
        <div class="col-auto mr-2 ml-auto">
            @if($userSocialmedia->visibility_id == '1')
                <span class="badge badge-success">
                    @lang('interface.visible')
                </span>
            @elseif($userSocialmedia->visibility_id < '1')
                <span class="badge badge-warning">
                    @lang('interface.invisible')
                </span>
            @endif
        </div>
        <div class="col-auto mr-2">
            @if($userSocialmedia->status_id == '1')
                <span class="badge badge-success">
                    @lang('interface.active')
                </span>
            @elseif($userSocialmedia->status_id < '1')
                <span class="badge badge-warning">
                    @lang('interface.inactive')
                </span>
            @endif
        </div>
        @if($userSocialmedia->user_id == Auth::User()->id)
        <div class="col-auto">
            <div class='btn-group'>
                <form id="socialmedia_visibility_form{{$m}}" action="/profile/users-social-medias/toggle-visibility" method="POST"> 
                    @csrf
                    <input id="inp_socialmedia_vis_id{{$m}}" type="hidden" name="socialmedia_id" value="{{ Crypt::encrypt($userSocialmedia->id) }}">
                    <button type="submit" form="socialmedia_visibility_form{{$m}}" role="button" class = "btn btn-default btn-sm">
                    @if($userSocialmedia->visibility_id == 0)
                    <i class="fa fa-eye"></i>
                    @elseif($userSocialmedia->visibility_id == 1)
                    <i class="fa fa-eye-slash"></i>
                    @endif
                    </button>
                </form>
                <form id="socialmedia_status_form{{$m}}" action="/profile/users-social-medias/toggle-status" method="POST"> 
                    @csrf
                    <input id="inp_socialmedia_sta_id{{$m}}" type="hidden" name="socialmedia_id" value="{{ Crypt::encrypt($userSocialmedia->id) }}">
                    <button type="submit" form="socialmedia_status_form{{$m}}" role="button" class = "btn btn-default btn-sm">
                            @if($userSocialmedia->status_id == 0)
                            <i class="fa fa-eye"></i>
                            @elseif($userSocialmedia->status_id == 1)
                            <i class="fa fa-eye-slash"></i>
                            @endif
                    </button>
                </form>
                {!! Form::open(['route' => ['users-social-medias.destroy', $userSocialmedia->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
        @endif
    </div>
    @php($m++)
    @empty
        @lang('interface.noItemsToDisplay')
    @endforelse
@endif