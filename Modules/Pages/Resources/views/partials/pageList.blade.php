@extends('pages::layouts.master')
    @section('image')
        @if(!is_null($categoryData->image))
            <img class="img-fluid" src="{{ $categoryData->image }}" alt="{{$categoryData->title}}" />
        @endif
    @endsection
    @section('content')
    @isset($categoryData)
        <h1>{{$categoryData->title}}</h1>
        <p class="lead">{{$categoryData->lead}}</p>
        <p>{!!$categoryData->content!!}</p>
    @endisset
    @isset($pageCategories)
        @if ($pageCategories->count())
            @foreach ($pageCategories as $pageCategory)
                <div class="card border mb-3">
                    <div class="row no-gutters card-body">
                        <div class="col-md-12 mb-2 border-bottom">
                            <a class="h4" href="/pages/{{ $pageCategory->parent->slug }}/{{ $pageCategory->slug }}" 
                                class="nav-link text-muted p-0 font-weight-bold  {{ ($pageCategory->slug == Route::currentRouteName())?'active':'' }}">
                                <span class="align-top" style="color:#0a8398">[</span>
                                <span style="color:#2b1b1b!important;">{{ $pageCategory->title }}</span>
                                <span class="align-top" style="color:#0a8398">::</span>
                            </a>
                        </div>
                        <div class="col-md-8 mr-auto">
                            <p>{{ $pageCategory->lead }}</p>
                            <a class="btn btn-outline-secondary" href="/pages/{{$pageCategory->slug}}">
                                En savoir plus
                            </a>
                        </div>
                        @if(!is_null($pageCategory->image) && $pageCategory->image > 0)  
                            <div class="col-md-4">
                                <img class="img-fluid" src="{{ $pageCategory->image }}" alt="{{ $pageCategory->title }}" />
                            </div>
                        @endif
                    </div>
                    @if(!is_null($pageCategory->created_at))
                    <div class="card-footer py-1">
                        <small>{{ $pageCategory->created_at }}</small>
                    </div>
                    @endif
                </div>
            @endforeach
        @endif
    @endisset
@endsection