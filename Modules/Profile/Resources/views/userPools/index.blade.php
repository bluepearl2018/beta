@extends('profile::layouts.master')
@if(Article::where('slug', 'users-pools')->first())
@php($metadataFromArticle = Article::where('slug', '=', 'users-pools')->first())
@php($metadata = $metadataFromArticle->extras)
@endif
@section('pageTitle')
@parent
@isset($metadata)
    {{ $metadata['meta_title'] }}
@endisset
@endsection
@section('pageDescription')
@parent
@isset($metadata)
    {{ $metadata['meta_description'] }}
@endisset
@endsection
@section('content')
<div class="border-left border-bottom border-right container py-3">
    @include('flash::message')
    <h1>
        @lang('users.myPools')    
        <a class="btn btn-primary pull-right mt-1" style="margin-top: -10px;margin-bottom: 5px" 
        href="{!! route('users-pools.create') !!}">
        @lang('interface.addNew')
        </a>
    </h1>
    <p class="lead">
        @isset($metadata)
            {{ $metadata['meta_description'] }}
        @endisset
    </p>
    <div class="container clearfix">
        @include('profile::userPools.table')
    </div>
</div>
@endsection