<!-- User Id Field -->
{{--<input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />--}}
<div class="row">
<!-- Socialmedia Id Field -->
<div class="form-group col-sm-12 clearfix">
    @php($it = 0)
    <p class="lead">Le référencement de vos médias sociaux est destiné 
        à enrichir les possibilités de réseautage via la plateforme collaborative.</p>
    <h2>Sélectionnez le média social à ajouter</h2>
    @foreach(Socialmedia::all() as $Socialmedia)
        <div class="form-check col-md-12">
            <input class="form-check-input" type="radio" name="socialmedia_id" 
            id="socialmedia_{{ $it }}" value="{{ $Socialmedia->id }}" required>
            <label class="form-check-label" for="exampleRadios1">
                {{ $Socialmedia->name }}
            </label>
        </div>
        @php($it++)
    @endforeach
</div>

<!-- Socialmedia Token Field -->
<div class="form-group col-sm-12 clearfix">
    <label for="socialMediaAccount">Votre identifiant*
    <br>Si votre page d'accueil sur Facebook est "https://www.facebook.com/eutranet"... saisissez "eutranet".
    <br>Si votre page d'accueil sur LinkedIn est "https://www.linkedin.com/eutranet"... saisissez "eutranet".
    <br>Si votre page d'accueil sur Twitter est "https://www.twitter.com/eutranet"... saisissez "eutranet".
    </label>
    <input id="socialMediaAccount" type="text" name="account" class="form-control" required />
    @if ($errors->has('account'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('account') }}</strong>
        </span>
    @endif
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-12 clearfix">
    <div class="form-check float-left mr-2">
        <input class="form-check-input {{ $errors->has('visibility_id') ? ' is-invalid' : '' }} mb-2" 
        type="radio" name="visibility_id" id="visibility_on" value="1" checked required>
        <label class="form-check-label" for="visibility_on">
            @lang('interface.visible')
        </label>
    </div>
    <div class="form-check float-left mr-2">
        <input class="form-check-input {{ $errors->has('visibility_id') ? ' is-invalid' : '' }} mb-2" 
        type="radio" name="visibility_id" id="visibility_off" value="0" required>
        <label class="form-check-label" for="visibility_off">
            @lang('interface.invisible')
        </label>
    </div>
    @if ($errors->has('visibility_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('visibility_id') }}</strong>
        </span>
    @endif
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-12 clearfix">
    <div class="form-check float-left mr-2">
        <input class="form-check-input {{ $errors->has('status_id') ? ' is-invalid' : '' }} mb-2" 
        type="radio" name="status_id" id="status_on" value="1" checked required>
        <label class="form-check-label" for="status_on">
            @lang('interface.active')
        </label>
    </div>
    <div class="form-check float-left mr-2">
        <input class="form-check-input {{ $errors->has('status_id') ? ' is-invalid' : '' }} mb-2" type="radio" name="status_id" id="status_off" value="0" required>
        <label class="form-check-label" for="status_off">
            @lang('interface.inactive')
        </label>
    </div>
    @if ($errors->has('status_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('status_id') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" role="button" class="btn btn-primary mr-2 mb-2">@lang('interface.save')</button>
    <a href="{{ route('users-social-medias.index') }}" class="btn btn-default mr-2 mb-2">
        @lang('interface.cancel')
    </a>
</div>
</div>