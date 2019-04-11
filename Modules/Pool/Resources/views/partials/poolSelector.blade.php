<?php $selectMainPools = \Modules\Pool\Entities\Pool::where('parent_id', NULL)->get(); ?>
@if(old('pool_id'))
    <?php $selectedPool = \Modules\Pool\Entities\Pool::where('id', old('pool_id'))->first(); ?>
@endif
<div class="form-group">
    <select id="selectMainPools" name="selectMainPools" class="form-control {{ $errors->has('selectMainPools') ? ' is-invalid' : '' }}" required>
        <option value="" selected required>@lang('pools.selectMainPool')</option>
        @foreach($selectMainPools as $keyMainPool => $mainPool )
            <option value="{{ $mainPool->slug }}" {{ (old("selectMainPools") == $mainPool->slug ? "selected":"") }} required>{{ $mainPool->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('selectMainPools'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('selectMainPools') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <select id="pool_id" name="pool_id" class="form-control {{ $errors->has('pool_id') ? ' is-invalid' : '' }}" required>
        @if(old('pool_id'))
            <option value="{{ $selectedPool->id }}" {{ (old('pool_id') == $selectedPool->id ? "selected":"") }} required>{{ $selectedPool->name }}</option>
        @else
        <option value="" required>@lang('pools.selectSubPool')</option>
        @endif
    </select>
    @if ($errors->has('pool_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('pool_id') }}</strong>
        </span>
    @endif
</div>
@push('scripts')
@endpush
@section('script')
@parent
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="selectMainPools"]').on('change', function() {
            var domain = $(this).val();
            if(domain == '') {
                console.log(domain);
                $('select[name="pool_id"]').empty();
            }
            else {
                $.ajax({
                    url: '/pools/poolSelector/ajax/'+domain,
                    dataType: 'json',
                    success:function(data) {
                        var c = 0;
                        console.log(data);
                        $.each(data, function(id, name) {
                            $('select[name="pool_id"]').append('<option value="'+ data[c].id +'" required>'+ data[c]['name']['{{ \App::getLocale() }}'] +'</option>');
                            c++;
                        });
                    }
                });
            }
        });
    });
</script>

@endsection