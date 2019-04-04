{{-- TODO redesign all contact blades --}}
@extends('layouts.contacts')
@section ('pageTitle')
    @lang('contacts.contactPoolManager')
@endsection
@section ('pageDescription')
    @lang('contacts.contactPoolManagerLead')
@endsection
@section('content')
@include('flash::message')

<div class="container mt-3">
    <h1 class="border-bottom">
        <i class="fa fa-users text-warning"></i>
        @lang('contacts.contactPoolManager')
    </h1>
    <p class="lead">
            @lang('contacts.contactPoolManagerLead')
    </p>
    <form id="contactPoolMgrForm" method="POST" action="/zones/contacts/contact-pool-manager/process-email">
            @csrf
            <h2>Composez votre message</h2>
            @include('contacts.contact_fields.firstname')
            @include('contacts.contact_fields.surname')
            @include('contacts.contact_fields.phone')
            @include('contacts.contact_fields.email_address')
            @include('contacts.contact_fields.subject')
            @include('contacts.contact_fields.body')
            @include('contacts.contact_fields.accept_gdpr')
            
            {{--- TODO CAPTCHA --}}
            <button form="contactPoolMgrForm" role="button" type="submit" class="btn btn-primary mr-2 mb-2 mt-2">
                @lang('interaction.sendMailing')
            </button>
        </form>
    </div>
@endsection