@extends('profile::layouts.master')
@section('content')
    @include('flash::message')
    <h1>@lang('profile.profileTitle')</h1>
    <p class="lead">@lang('profile.profileLead')</p>
    <div class="clearfix"></div>
    @isset($userProfile)
        @include('profile::userProfile.userPublicProfile', [ 'userProfile' => $userProfile ])
    @endisset
@stop