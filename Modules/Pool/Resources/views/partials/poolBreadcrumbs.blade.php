
<nav aria-label="breadcrumb">
    
        <ol class="breadcrumb mb-0 px-3 py-1">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}"><i class="fa fa-home text-muted"></i></a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/pools') }}"><i class="fa fa-users text-muted"></i></a>
            </li>
            @if(isset($pool))
            @if(isset($bcSlugs) && ! empty($bcSlugs))
                @if(isset($bcSlugs[1]) && isset($pool->parent->slug) && $bcSlugs[1] == $pool->parent->slug)
                    <li class="breadcrumb-item">
                        <a class="text-muted" href="{{ url('/pools') }}/{{ $bcSlugs[1] }}">
                            {{ $pool->parent->name }}
                        </a>
                    </li>
                    @else
                    <li class="breadcrumb-item">
                        <a class="text-muted" href="{{ url('/pools') }}/{{ $bcSlugs[1] }}">
                            {{ $pool->name }}
                        </a>
                    </li>
                @endif
                @if(isset($bcSlugs[2]))
                    <li class="breadcrumb-item">
                        <a class="text-muted" href="{{ url('/pools') }}/{{ $bcSlugs[1] }}/{{ $bcSlugs[2] }}">
                            {{ $pool->name }}
                        </a>
                    </li>
                @endif
            @endisset
            @endisset
    </ol>
</nav>