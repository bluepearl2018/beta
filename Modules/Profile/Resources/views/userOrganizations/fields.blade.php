<?php // TODO : créer une liste en cascade avec pays et catégories ?>
<div class="row no-gutters">
<div class="form-group col-sm-12 clearfix">
<select id="organization_id" class="form-control{{ $errors->has('organization_id') ? ' is-invalid' : '' }} mb-2" 
    name="organization_id" value="{{ old('organization_id') }}" required autofocus>
    <option value="" required>@lang('interface.selectOrganization')</option>
    @foreach(\Modules\UiTables\Entities\Organization::orderBy('name', 'asc')->get() as $organization)
        <option value="{{ $organization->id }}" required>{{ $organization->name }}</option>
    @endforeach
    @if ($errors->has('organization_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('organization_id') }}</strong>
        </span>
    @endif
</select>
</div>

<!-- Visibility -->
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

<!-- Status -->
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
    <a href="{{ route('users-organizations.index') }}" class="btn btn-default mr-2 mb-2">
        @lang('interface.cancel')
    </a>
</div>
</div>