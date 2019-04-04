{{-- TODO redesign all contact blades --}}
@extends('contact::layouts.master')
@section('content')
@include('flash::message')
<div class="mt-2">
    <h1 class="border-bottom">
        <i class="fa fa-envelope"></i>
        @lang('contact.contactUs')
    </h1>
    <p class="lead">
        @lang('contact.contactUs')
    </p>
    <form id="sendMessage" method="POST" action="{{route('contact-post')}}">
            @csrf
            @include('contact::partials.contact_fields.firstname')
            @include('contact::partials.contact_fields.surname')
            @include('contact::partials.contact_fields.phone')
            @include('contact::partials.contact_fields.email_address')
            @include('contact::partials.contact_fields.subject')
            @include('contact::partials.contact_fields.body')
            @include('contact::partials.contact_fields.accept_gdpr')
            
            {{--- TODO CAPTCHA --}}
            <button form="sendMessage" type="submit" class="btn btn-primary mt-3">@lang('contact::partials.sendMessage')</button>
        </form>
    </div>
@endsection