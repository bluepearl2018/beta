<nav aria-label="breadcrumb">
    <small>
        <ol class="breadcrumb mb-0 px-3 py-1">
            @if($bcSlugs[0] == 'blog')
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}"><i class="fa fa-home text-muted"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/blog') }}"><i class="fa fa-rss text-muted"></i></a>
                </li>
            @endif
            @if(isset($currentArticle))
                    @if(isset($bcSlugs) && ! empty($bcSlugs))
                        @if(isset($bcSlugs[1]) && isset($currentArticle->parent->slug) && $bcSlugs[1] == $currentArticle->parent->slug)
                            <li class="breadcrumb-item">
                                <a class="text-muted" href="{{ url('/blog') }}/{{ $bcSlugs[1] }}">
                                    {{ $currentArticle->parent->title }}
                                </a>
                            </li>
                            @else
                            <li class="breadcrumb-item">
                                <a class="text-muted" href="{{ url('/blog') }}/{{ $bcSlugs[1] }}">
                                    {{ $currentArticle->title }}
                                </a>
                            </li>
                        @endif
                        @if(isset($bcSlugs[2]))
                            <li class="breadcrumb-item">
                                <a class="text-muted" href="{{ url('/blog') }}/{{ $bcSlugs[1] }}/{{ $bcSlugs[2] }}">
                                    {{ $currentArticle->title }}
                                </a>
                            </li>
                        @endif
                    @endisset
            @endif
        </ol>
    </small>
</nav>