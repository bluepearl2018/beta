<nav aria-label="breadcrumb">
    <small>
        <ol class="breadcrumb mb-0 px-3 py-1">
            @if($bcSlugs[0] == 'welcome')
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}"><i class="fa fa-home text-muted"></i></a>
                </li>
            @elseif(isset($currentPage))
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}"><i class="fa fa-home text-muted"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/pages') }}"><i class="fa fa-rss text-muted"></i></a>
                    </li>
                    @if(isset($bcSlugs) && ! empty($bcSlugs))
                        @if(isset($bcSlugs[1]) && isset($currentPage->parent->slug) && $bcSlugs[1] == $currentPage->parent->slug)
                            <li class="breadcrumb-item">
                                <a class="text-muted" href="{{ url('/welcome') }}/{{ $bcSlugs[1] }}">
                                    {{ $currentPage->parent->title }}
                                </a>
                            </li>
                        @endif
                        @if(isset($bcSlugs[2]))
                            <li class="breadcrumb-item">
                                <a class="text-muted" href="{{ url('/blog') }}/{{ $bcSlugs[1] }}/{{ $bcSlugs[2] }}">
                                    {{ $currentPage->title }}
                                </a>
                            </li>
                        @endif
                    @endisset
            @endif
        </ol>
    </small>
</nav>