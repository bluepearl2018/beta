@isset($pageData)
<div class="container-fluid py-3">
    <h1>
        {{ $pageData['title'] }}
    </h1>
    <p class="lead">
        {{ $pageData['lead'] }}
    </p>
    <p> 
        @if(! is_null($pageData['image']))
            <img class="img-thumbnail rounded float-left mb-2" src="{{-- asset($articleData['image']) --}}" alt="{{ $articleData['title'] }}" />
        @endif
        {{ $pageData['content'] }}
    </p>
</div>
@endisset