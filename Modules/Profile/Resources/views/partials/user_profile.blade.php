@extends('workspace.toolbox')
@if(Article::where('slug', 'profile')->first())
@php($metadataFromArticle = Article::where('slug', '=', 'profile')->first())
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
<div class="container border-left border-right border-bottom p-3">
    <div class="col-md-12">
            @component('users.user_profile.user_profile_premium', 
            [
                'userProfile' => $userProfile
            ])
            @endcomponent
    </div>
</div>
@endsection