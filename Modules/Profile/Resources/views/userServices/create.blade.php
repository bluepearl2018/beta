@extends('layouts.toolbox')
@if(Article::where('slug', 'users-services')->first())
@php($metadata = Article::where('slug', '=', 'users-services')->first())
@endif
@section('pageTitle')
@parent
@isset($metadata)
    {{ json_decode($metadata->extras)->meta_title }}
@endisset
@endsection
@section('pageDescription')
@parent
@isset($metadata)
    {{ json_decode($metadata->extras)->meta_description }}
@endisset
@endsection
@section('content')
<div class="border-left border-right border-bottom container py-3">
    @include('flash::message')
    <h1 class="pull-left">
        @lang('users.myServices')
    </h1>
    <a class="btn btn-primary pull-right mt-1" style="margin-top: -10px;margin-bottom: 5px" 
    href="{!! route('users-services.create') !!}">
    @lang('interface.addNew')
    </a>@if ($errors->any())
        <div class="container alert alert-danger mb-2">
            <ul class="m-0 pb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p class="lead">
        @if(Route::name('users-services'))
            @if(Article::where('slug', 'users-services')->first())
                @php($article = Article::where('slug', 'users-services')->first())
                {{ json_decode($article->extras)->meta_description }}
            @endif
        @endif
    </p>
    <div class="row container">
        {{ Form::open(['route' => 'users-services.store']) }}
            @include('users.user_services.fields')
        {{ Form::close() }}
    </div>
</div>
@endsection