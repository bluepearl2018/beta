@extends('profile::layouts.master')
@section('content')
<div class="border-left border-right border-bottom container py-3">
    @include('flash::message')
        <h1>
            @lang('users.myLanguagePairs')
        <a class="btn btn-primary pull-right mt-1" style="margin-top: -10px;margin-bottom: 5px" 
        href="{{ route('users-language-pairs.create') }}">
        @lang('interface.addNew')
        </a>
        </h1>
        <p class="lead">
            @isset($metadata)
                {{ json_decode($metadata->extras['meta_description']) }}
            @endisset
        </p>
        <div class="clearfix">
            @include('profile::userLanguagePairs.table')
        </div>
    </div>
</div>
@endsection