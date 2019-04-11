@extends('profile::layouts.master')
@section('content')
    @include('flash::message')
    <h1>@lang('profile.profileTitle') (User Id = {{ Auth::User()->id }})</h1>
    <p class="lead">@lang('profile.profileLead')</p>
    <div class="clearfix"></div>
    @isset($userProfile)
        @include('profile::userProfile.userProfile', [ 'userProfile' => $userProfile ])
    @endisset
@stop