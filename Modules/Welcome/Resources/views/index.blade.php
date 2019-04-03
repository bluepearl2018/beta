@extends('welcome::layouts.master')
<div class="container row">
    @section('menu')
        @include('welcome::partials.welcomeMenu')
    @endsection
    @section('content')
        <h1>@lang('welcome.welcomeTitle')</h1>
        <p class="lead">
            @lang('welcome.welcomeLead')
        </p>
        <div class="clearfix w-100">
            @include('welcome::ctas.welcomeCtas')
        </div>
        <div class="clearfix w-100">
            @include('welcome::ctas.welcomeTour')
        </div>
        <div class="clearfix w-100">
            @include('blog::partials.blogLatestNewBox')
        </div>
        @if(Module::has('subscription'))
            <div class="clearfix w-100">
                @include('subscription::ctas.subscribeNow')
            </div>
        @endif
    @endsection
    @section('aside')
        @guest
            @include('partials.login')
        @endguest
    @endsection
</div>