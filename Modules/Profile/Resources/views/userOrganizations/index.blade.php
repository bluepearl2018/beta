@extends('profile::layouts.master')
@if(Article::where('slug', 'users-organizations')->first())
    @php($metadataFromArticle = Article::where('slug', '=', 'users-organizations')->first())
    @php($metadata = $metadataFromArticle->extras)
@endif
@section('pageTitle')
    @parent
        @isset($metadata['meta_title'])
            {{ $metadata['meta_title'] }}
        @endisset
@endsection
@section('pageDescription')
    @parent
        @isset($metadata['meta_description'])
            {{ $metadata['meta_description'] }}
        @endisset
@endsection
@section('content')
<div class="py-3">
    @include('flash::message')
    <div class="card">
        <h2 class="card-header bg-secondary">
            <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-organizations/create">
                <i class="fa fa-plus"></i>
            </a>
            @if(Request::is('profile'))
            <a class="btn btn-sm float-right mb-2 mx-1 text-dark" href="/profile/users-organizations">
                <i class="fa fa-edit"></i>
            </a>
            @endif
            @lang('profile.myOrganizationsIndex')
        </h2>
        <div class="card-body">
            @isset($metadata['meta_description'])
                <p class="lead">{{ $metadata['meta_description'] }}</p>
            @endisset
            @include('profile::userOrganizations.table')
        </div>
    </div>
</div>
@endsection