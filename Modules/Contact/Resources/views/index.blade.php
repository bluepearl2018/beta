@extends('contact::layouts.master')

@section('content')
    <h1>@lang('contact.contactTitle')</h1>
    <p class="lead">
            @lang('contact.contactLead')
    </p>
    <div class="card-columns">
        
            <div class="card text-center">
                <h6 class="card-header">@lang('contact.contactEutranet')</h6>
                <i class="fa fa-envelope fa-3x d-block card-body"></i>
            </div>
            <div class="card text-center">
                <h6 class="card-header">@lang('contact.contactCoreTeam')
                @if(!Auth::check())<i class="fa fa-lock text-danger"></i>@endif
                </h6>
                <i class="fa fa-bolt fa-3x d-block card-body"></i>
                <div class="card-footer">
                    @if(!Auth::check())@lang('contact.youMustBeRegistered')@endif
                </div>
            </div>
        
        
            <div class="card text-center">
                <h6 class="card-header">@lang('contact.reportBug')</h6>
                <i class="fa fa-bug fa-3x d-block card-body"></i>
            </div>
        
        
            <div class="card text-center">
                <h6 class="card-header">@lang('contact.reportBug')</h6>
                <i class="fa fa-bug fa-3x d-block card-body"></i>
            </div>
        
            <div class="card text-center">
                <h6 class="card-header">@lang('contact.reportBug')</h6>
                <i class="fa fa-bug fa-3x d-block card-body"></i>
            </div>
        
            <div class="card text-center">
                <h6 class="card-header">@lang('contact.reportBug')</h6>
                <i class="fa fa-bug fa-3x d-block card-body"></i>
            </div>
        
    </div>
    @stop
