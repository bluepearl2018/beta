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
    <select id="pool_id" name="pool_id" class="form-control {{ $errors->has('selectMainPools') ? ' is-invalid' : '' }}" required>
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
<nav class="flex-row">
    <a id="poolFinderBtn" role="button" href="" 
    class="btn btn-primary mb-3 mr-2 collapse">Chercher</a>
</nav>

@section('script')

@parent
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="selectMainPools"]').on('change', function() {
            var domain = $(this).val();
            if(domain == '') {
                
                $('select[name="pool_id"]').empty();
                $('select[name="selectMainPools"]').append('<option value="" selected required>@lang('pools.selectMainPool')</option>');
                $('select[name="pool_id"]').append('<option value="" selected required>@lang('pools.selectSubPool')</option>');
                
            }
            else {
                $.ajax({
                    url: 'http://localhost:8000/pools/poolSelector/ajax/'+domain,
                    dataType: 'json',
                    success:function(data) {
                        $('select[name="pool_id"]').empty();
                        var c = 0;
                        console.log(data);
                        $('select[name="pool_id"]').append('<option> @lang('pools.selectSubPool') </option>');
                        $.each(data, function(id, name) {
                            $('select[name="pool_id"]').append('<option value="'+ data[c].slug +'" required>'+ data[c]['name']['{{\App::getLocale()}}'] +'</option>');
                            c++;
                        });
                        $('select[name="pool_id"]').on('change', function() {
                            var selectedPool = $(this).val();
                            console.log(selectedPool);
                            var hrefToPool = "/pools/"+ domain + "/" + selectedPool;
                            $('a[id="poolFinderBtn"]').attr('href', hrefToPool); 
                            $('a[id="poolFinderBtn"]').show();
                        });
                    }
                });
            }
        });

    });
</script>

@endsection