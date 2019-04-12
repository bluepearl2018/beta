@extends('pages::layouts.master')
@section('content')
<div class="container-fluid m0 p-3">
    <h1>@lang('pages.pagesTitle')</h1>
    <p class="lead">
        @lang('pages.pagesLead')
    </p>
    @if(isset($pagesData))
        @include('pages::partials.pagesList')
    @endif
    @if(isset($pagesList))
        @include('pages::partials.pagesLatestNewBox')
        @php($i = 1)
        @foreach($pagesList->groupBy('parent_id', 'ASC') as $k)
            <div class="d-flex card-deck">
                @foreach($k as $a)
                    <div class="card mt-3">
                        <h6 class="card-header">
                            {{ $a['title'] }}
                        </h6>
                        <div class="card-body">
                            @foreach($a->children->take(2) as $b => $v)
                                <a class="d-block" href="/pages/{{ $v->parent->slug }}/{{ $v->slug }}">{{ $v->title }}</a>
                            @endforeach
                        </div>
                    </div>
                    @if($i/1 == 1)
                        <div class="w-100 d-sm-block d-md-none"><!-- wrap every 2 on md--></div>
                    @endif
                    @if($i/2 == 1)
                        <div class="w-100 d-none-block d-md-block"><!-- wrap every 2 on md--></div>
                    @endif
                    @php($i++)
                @endforeach
            </div>
        @endforeach
    @endif
</div>
@stop