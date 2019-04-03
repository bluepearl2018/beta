@isset($breadcrumbs)
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        @forelse ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item ">
                    <a href="{{ $breadcrumb->url }}">
                        <i class="{{ $breadcrumb->class }}"></i>
                    </a>
                </li>
            @else
                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                
            @endif
            @empty
            <li class="breadcrumb-item active">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i>
                </a>
            </li>
        @endforelse
    </ol>
</nav>
@else
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i>
                </a>
            </li>
        </ol>
    </nav>
@endisset