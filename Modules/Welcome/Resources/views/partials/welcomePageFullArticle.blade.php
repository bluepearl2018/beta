@isset($articleData)
    <h1>
        {{ $articleData['title'] }}
    </h1>
    <p class="lead">
        {{ $articleData['lead'] }}
    </p>
    <p> 
        @if(! is_null($articleData['image']))
            <img class="img-thumbnail rounded float-left mb-2" src="{{-- asset($articleData['image']) --}}" alt="{{ $articleData['title'] }}" />
        @endif    
        {{ $articleData['content'] }}
    </p>
@endisset