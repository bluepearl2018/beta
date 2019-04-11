{{-- TODO : $selectTools where not in my TOOLS --}}
{{-- <input type="hidden" name="user_id" value="{{ Auth::User()['id'] }}" required /> --}}

<!-- Select Tool Id Field -->
<div class="form-row col-md-12">
    <?php 
        dd(\App\Models\ServiceCategory::all());
        $selectServices = \App\Models\Service::all(); 
    ?>
    <div class="form-group">
        <select id="selectServices" name="service_id" class="form-control-sm form-control">
            <option value="" required>@lang('interface.selectService')</option>
            @foreach($selectServices as $keyService => $Service )
                <option value="{{ $Service->id }}" required>{{ $Service->name }}</option>
            @endforeach
        </select>
    </div>
</div>

{{-- Min Rate --}}
<div class="form-group col-sm-12 clearfix">
    <div class="form-group">
        <label for="minrate" class="col-12">
            @lang('users.minRatePerHour')
        </label>
        <input type="text" name="min_rate" class="form-control-sm {{ $errors->has('min_rate') ? ' is-invalid' : '' }} mb-2" aria-label="Min hour rate with dot and up to three decimal places" required> € / h
        
        @if ($errors->has('min_rate'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('min_rate') }}</strong>
            </span>
        @endif
    </div>
</div>

{{-- Max Rate --}}
<div class="form-group col-sm-12 clearfix">
<div class="form-group">
    <label for="maxrate" class="col-12">
        @lang('users.maxRatePerHour')
    </label>
    <input id="maxrate" type="text" name="max_rate" class="form-control-sm {{ $errors->has('max_rate') ? ' is-invalid' : '' }} mb-2" aria-label="Min hour rate with dot and up to three decimal places" required> € / h
    
    @if ($errors->has('max_rate'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('max_rate') }}</strong>
        </span>
    @endif
</div>
</div>

<!-- Visibility Id Field -->
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
    <a href="{{ route('users-services.index') }}" class="btn btn-default mr-2 mb-2">
        @lang('interface.cancel')
    </a>
</div>