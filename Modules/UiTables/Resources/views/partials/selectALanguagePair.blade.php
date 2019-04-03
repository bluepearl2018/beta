{{-- TODO : add language translations --}}
<?php
$selectSrcLang = \Modules\UiTables\Entities\Sourcelanguage::all(); 

?>
<div class="form-group">
    <select id="sourceLang_id" name="sourceLang_id" class="form-control">
        <option value="" required>@lang('interface.srcLang')</option>
        @foreach($selectSrcLang as $k => $v )
            <option value="{{ $v->id }}" required>{{ $v->name }} - {{ $v->region }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <select id="targetLang_id" name="targetLang_id" class="form-control">
        <option value="" required>@lang('interface.tgtLang')</option>
    </select>
</div>
@push('scripts')
@endpush
@section('script')
@parent
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[id="sourceLang_id"]').on('change', function() {
            var sourceLang_id = $(this).val();
            if(sourceLang_id) {
                $.ajax({
                    url: 'http://localhost:8000/tgtLangSelector/ajax/'+sourceLang_id,
                    dataType: 'json',
                    success:function(data) {
                        $('select[id="targetLang_id"]').empty();
                        var c = 0;
                        console.log(data);
                        $.each(data, function(id, name) {
                            $('select[id="targetLang_id"]').append('<option value="'+ data[c].id +'">'+ data[c].name +'</option>');
                            c++;
                        });
                    }
                });
            }
            else{
                $('select[id="targetLang_id"]').empty();
            }
        });
    });
</script>

@endsection