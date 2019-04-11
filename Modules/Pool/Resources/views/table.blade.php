@isset($categoryData)
    @if($categoryData->title)
        <h2>{{ $categoryData->title }}</h2>
    @endif
@endisset
@isset($poolsData)
        <div class="table" style="width:100%">
            @forelse($poolsData as $k => $v)
                <div class="row">
                    <div class="col-auto">
                        <a href="/pools/{{ $v->parent->slug }}/{{ $v->slug }}">{{ $v->name }}</a>
                    </div>
                    <div class="col-auto ml-auto">
                        <a href="/pools/{{ $v->parent->slug }}/{{ $v->slug }}" class="fa fa-eye"></a>
                    </div>
                </div>
            @empty
                @lang('interface.noItemsToDisplay')
            @endforelse
        </div>
@endisset