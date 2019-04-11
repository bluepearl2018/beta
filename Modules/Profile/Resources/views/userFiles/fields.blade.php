{{-- TODO : $selectTools where not in my TOOLS --}}
{{-- <input type="hidden" name="user_id" value="{{ Auth::User()['id'] }}" required /> --}}
<div class="row no-gutters">
        <!-- Select Tool Id Field -->
        <div class="form-group col-sm-12 clearfix">
            <?php $selectFileTypes = Modules\UiTables\Entities\FileType::where('id', '2')->get(); ?>
            <select id="selectFileTypes" name="file_type_id" class="form-control form-control" readonly disabled>
                @foreach($selectFileTypes as $keyFileType => $FileType )
                    <option value="{{ $FileType->id }}" required>{{ $FileType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12 clearfix">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">@lang('interface.upload')</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="upload_file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">@lang('interface.selectAFile')</label>
                </div>
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
            <a href="{{ route('users-files.index') }}" class="btn btn-default mr-2 mb-2">
                @lang('interface.cancel')
            </a>
        </div>
        </div>