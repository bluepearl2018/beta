@extends('workspace.toolbox')
@if(Article::where('slug', 'users-services')->first())
@php($metadataFromArticle = Article::where('slug', '=', 'users-services')->first())
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
<div class="border-left border-right border-bottom container py-3">
    @include('flash::message')
    <section class="content-header clearfix">
        <h1 class="pull-left">
            @lang('users.myServices')
        </h1>
        <a class="btn btn-primary pull-right mt-1" style="margin-top: -10px;margin-bottom: 5px" 
        href="{!! route('users-services.create') !!}">
        @lang('interface.addNew')
        </a>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <p class="lead">
            @isset($metadata)
                {{ $metadata['meta_description'] }}
            @endisset
        </p>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('users.user_services.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
</div>
@endsection