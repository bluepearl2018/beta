@isset($pageLatestArticle)
<div class="card">
    <h6 class="card-header">
        @lang('page.pageLatestNews')
    </h6>
    <div class="card-body">
        <h2 class="card-title">
            {{ $pageLatestArticle['title'] }}
        </h2>
        @if(! is_null($pageLatestArticle['image']))
            <img class="img-fluid mb-2" src="{{-- asset($pageLatestArticle['image']) --}}" alt="{{ $pageLatestArticle['title'] }}" />
        @endif
        <p class="lead">
            {{ $pageLatestArticle['lead'] }}
        </p>
        <p>     
            @if(strlen($pageLatestArticle['content'] < '160'))
                {{ $pageLatestArticle['content'] }}
            @else
                {{ substr($pageLatestArticle['content'], 0, 155) }}...
                <a class="btn-link" href="/page/@if(isset($pageLatestArticle->parent->slug)){{$pageLatestArticle->parent->slug}}/@endif{{ $pageLatestArticle->slug }}">@lang('interface.readMore')</a>
            @endif
        </p>
    </div>
    <a class="btn btn-primary btn-sm card-footer" href="/page/@if(isset($pageLatestArticle->parent->slug)){{$pageLatestArticle->parent->slug}}/@endif{{ $pageLatestArticle->slug }}">
        @lang('page.showArticle')
    </a>
</div>
@endisset