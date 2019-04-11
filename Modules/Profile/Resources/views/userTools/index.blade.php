@extends('profile::layouts.master')
@if(Article::where('slug', 'users-tools')->first())
@php($metadataFromArticle = Article::where('slug', '=', 'users-tools')->first())
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
    @include('flash::message')
    @include('profile::userTools.user_tools')
@endsection