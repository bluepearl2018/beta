@extends('blog::layouts.master')
@section('content')
    @component('blog::partials.blogFullArticle', ['articleData' => $articleData])@endcomponent
@stop
