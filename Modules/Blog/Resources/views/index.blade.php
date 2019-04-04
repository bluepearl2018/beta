@extends('blog::layouts.master')
@section('content')
    <h1>@lang('blog.blogTitle')</h1>
    <p class="lead">
        @lang('blog.blogLead')
    </p>
    @if(isset($blogData))
        @include('blog::partials.blogList')
    @endif
    @if(isset($blogList))
        @include('blog::partials.blogLatestNewBox')
        <div class="card-deck">
            @php($i = 1)
            @foreach($blogList->groupBy('parent_id', 'ASC') as $k)
                @foreach($k as $a)
                    <div class="card mt-3">
                        <h6 class="card-header">
                            {{ $a['title'] }}
                        </h6>
                        <div class="card-body">
                            @foreach($a->children->take(2) as $b => $v)
                                <a class="d-block" href="/blog/{{ $v->parent->slug }}/{{ $v->slug }}">{{ $v->title }}</a>
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
            @endforeach
        </div>
    @endif
@stop
