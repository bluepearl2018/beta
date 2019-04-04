<nav aria-label="breadcrumb">
    <small>
        <ol class="breadcrumb mb-0 px-3 py-1">
            @if($bcSlugs[0] == 'contact')
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}"><i class="fa fa-home text-muted"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/contact') }}"><i class="fa fa-envelope text-muted"></i></a>
                </li>
            @endif
            @if(isset($currentContact))
                    @if(isset($bcSlugs) && ! empty($bcSlugs))
                        @if(isset($bcSlugs[1]) && isset($currentContact->parent->slug) && $bcSlugs[1] == $currentContact->parent->slug)
                            <li class="breadcrumb-item">
                                <a class="text-muted" href="{{ url('/contact') }}/{{ $bcSlugs[1] }}">
                                    {{ $currentContact->parent->title }}
                                </a>
                            </li>
                            @else
                            <li class="breadcrumb-item">
                                <a class="text-muted" href="{{ url('/contact') }}/{{ $bcSlugs[0] }}">
                                    {{ $currentContact->title }}
                                </a>
                            </li>
                        @endif
                        @if(isset($bcSlugs[2]))
                            <li class="breadcrumb-item">
                                <a class="text-muted" href="{{ url('/contact') }}/{{ $bcSlugs[1] }}/{{ $bcSlugs[2] }}">
                                    {{ $currentContact->title }}
                                </a>
                            </li>
                        @endif
                    @endisset
            @endif
        </ol>
    </small>
</nav>