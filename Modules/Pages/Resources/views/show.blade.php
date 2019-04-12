@extends('pages::layouts.master')
@section('content')
    @component('pages::partials.pageFullArticle', ['pageData' => $pageData])@endcomponent
@stop