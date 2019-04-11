@extends('welcome::layouts.master')
@section('content')
    @include('flash::message')
    <h1>{{ $currentPage->title }}</h1>
    <p class="lead">
    {{ $currentPage->lead }}
    </p>
    <div class="clearfix">
        @include('welcome::ctas.welcomeCtas')
    </div>
    @if(Module::has('blog'))
        <div class="clearfix">
            @include('blog::partials.blogLatestNewBox')
        </div>
    @endif
    <div class="card-body border">
        {{ $currentPage->content }}
    </div>
@endsection
@section('aside')
        @if(! Module::has('pool'))
            <div class="card mb-3">
                <h6 class="card-header">
                    @lang('marketing.preRegister')
                </h6>
                <div class="card-body"></div>
                <div class="card-footer">
                    @lang('marketing.preRegisterLink')
                </div>
            </div>
        @elseif(Module::has('pool'))
            Pool selector
        @endif
        @if(Module::has('subscription'))
            <div class="clearfix w-100">
                @include('subscription::ctas.subscribeNow')
            </div>
        @endif
        @guest
            @include('partials.login')
        @endguest
@endsection
@section('script')
@endsection