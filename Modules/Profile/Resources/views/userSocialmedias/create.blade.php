@extends('profile::layouts.master')
@if(Article::where('slug', 'users-social-medias')->first())
@php($metadataFromArticle = Article::where('slug', '=', 'users-social-medias')->first())
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
    <h1 class="pull-left">
        @lang('users.mySocialMedias')
    </h1>
    <a class="btn btn-primary pull-right mt-1" style="margin-top: -10px;margin-bottom: 5px" 
    href="{!! route('users-social-medias.create') !!}">
    @lang('interface.addNew')
    </a>
    @if ($errors->any())
        <div class="container alert alert-danger mb-2">
            <ul class="m-0 pb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p class="lead">        
        @isset($metadata)
        {{ $metadata['meta_description'] }}
        @endisset
    </p>
    <div class="row container">
        {{ Form::open(['route' => 'users-social-medias.store']) }}
            @include('profile::userSocialmedias.fields')
        {{ Form::close() }}
    </div>
</div>
@endsection