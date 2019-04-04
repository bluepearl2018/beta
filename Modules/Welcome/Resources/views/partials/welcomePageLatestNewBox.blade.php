@isset($blogLatestArticle)
<div class="card">
    <h6 class="card-header">
        @lang('blog.blogLatestNews')
    </h6>
    <div class="card-body">
        <h2 class="card-title">
            {{ $blogLatestArticle['title'] }}
        </h2>
        @if(! is_null($blogLatestArticle['image']))
            <img class="img-fluid mb-2" src="{{-- asset($blogLatestArticle['image']) --}}" alt="{{ $blogLatestArticle['title'] }}" />
        @endif
        <p class="lead">
            {{ $blogLatestArticle['lead'] }}
        </p>
        <p>     
            @if(strlen($blogLatestArticle['content'] < '160'))
                {{ $blogLatestArticle['content'] }}
            @else
                {{ substr($blogLatestArticle['content'], 0, 155) }}...
                <a class="btn-link" href="/blog/@if(isset($blogLatestArticle->parent->slug)){{$blogLatestArticle->parent->slug}}/@endif{{ $blogLatestArticle->slug }}">@lang('interface.readMore')</a>
            @endif
        </p>
    </div>
    <a class="btn btn-primary btn-sm card-footer" href="/blog/@if(isset($blogLatestArticle->parent->slug)){{$blogLatestArticle->parent->slug}}/@endif{{ $blogLatestArticle->slug }}">
        @lang('blog.showArticle')
    </a>
</div>
@endisset