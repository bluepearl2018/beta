<select id="sourceLang_id" class="form-control{{ $errors->has('mother_language') ? ' is-invalid' : '' }} mb-2" 
    name="sourceLang_id" value="{{ old('sourceLang_id') }}" required autofocus>
    <option value="" required>
        @lang('interface.selectSrcLang')
    </option>
    @foreach(\App\Models\SourceLanguage::orderBy('name', 'asc')->get() as $sourceLang)
        <option value="{{ $sourceLang->id }}" required>{{ $sourceLang->name }}</option>
    @endforeach
    @if ($errors->has('sourceLang_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sourceLang_id') }}</strong>
        </span>
    @endif
</select>