<select id="targetLang_id" name="targetLang_id" class="form-control{{ $errors->has('mother_language') ? ' is-invalid' : '' }} mb-2" 
        name="targetLang_id" value="{{ old('targetLang_id') }}" required autofocus>
    <option value="" required>@lang('interface.selectTgtLang')</option>
    @foreach(\App\Models\TargetLanguage::orderBy('name', 'asc')->get() as $targetLang)
        <option value="{{ $targetLang->id }}" required>{{ $targetLang->name }}</option>
    @endforeach
    @if ($errors->has('targetLang_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('targetLang_id') }}</strong>
        </span>
    @endif
</select>