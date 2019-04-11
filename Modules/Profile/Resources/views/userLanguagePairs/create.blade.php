@extends('profile::layouts.master')
@section('content')
<div class="border-left border-bottom border-right container py-3">
    @include('flash::message')
    <h1>
        @lang('users.myLanguagePairs')
        <a class="btn btn-primary pull-right mt-1" style="margin-top: -10px;margin-bottom: 5px" 
        href="{!! route('users-language-pairs.create') !!}">
        @lang('interface.addNew')
        </a>
    </h1>
    <p class="lead">
        @isset($metadata)
            {{ json_decode($metadata->extras['meta_description']) }}
        @endisset
    </p>
    @if ($errors->any())
        <div class="container alert alert-danger mb-2">
            <ul class="m-0 pb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row container">
        {{ Form::open(['route' => 'users-language-pairs.store']) }}
            @include('profile::userLanguagePairs.fields')
        {{ Form::close() }}
    </div>
</div>
@endsection