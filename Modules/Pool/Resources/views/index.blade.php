@extends('pool::layouts.master')
@section('content')
    <h1>@lang('pool.poolModuleTitle')</h1>
    <p class="lead">
        @lang('pool.poolModuleLead')
    </p>
    <p>
        @lang('pool.poolModuleContent')
    </p>
    @isset($poolsData)
        @include('pool::domain.domainPools')
    @endisset
@endsection
@section('aside')
    {{--- Pool finder --}}
    <div class="card p-3 my-3" style="background-color: teal">
        <h2 class="text-light">Trouver mon équipe d'experts</h2>
        @include('pool::partials.poolSelectorWithButton')
    </div>
@endsection