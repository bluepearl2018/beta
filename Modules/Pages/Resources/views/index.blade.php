@extends('pages::layouts.master')
@section('content')
    @include('flash::message')
    <h1>@lang('pages.pagesTitle')</h1>
    <p class="lead">@lang('pages.pagesLead')</p>
    <div class="row d-flex">
        @foreach($pageList as $pageCategory)
            @if($pageCategory->slug !== 'welcome')
                <div class="col-md-6 mb-3">
                    <div class="p-2 bg-white">
                        {{$pageCategory->title}}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@stop
