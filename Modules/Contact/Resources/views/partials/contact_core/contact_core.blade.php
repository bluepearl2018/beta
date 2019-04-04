@extends('contact::layouts.master')
@section('content')
@include('flash::message')
<div class="mt-2">
    <h1>
        <i class="fa fa-mail-bulk"></i>
        @lang('contacts.coreTeamMember')
    </h1>
    <p class="lead">@lang('contacts.coreTeamMemberLead')</p>
    <form id="sendCoreMailingForm" action="{{route('contact-core-post')}}" method="POST">
        <h2>@lang('contacts.selectACoreMember')</h2>
        @csrf
        @forelse($coreTeam as $teamMember)
            <div class="row container mb-2">
                <div class="form-col">
                    <input type="radio" name="isMailable" unchecked/>
                    <input type="hidden" name="mailable" value="{{ Crypt::encrypt($teamMember->id) }}" />
                    {{ $teamMember->firstname }} {{ $teamMember->surname }}
                </div>
            </div>
        @empty    
            <div class="row container mb-2">
                @lang('interface.noItemsToDisplay')
            </div>
        @endforelse
        @if(!empty($coreTeam))
        <h2>Composez votre message</h2>
    
        @include('contact::partials.contact_fields.firstname')
        @include('contact::partials.contact_fields.surname')
        @include('contact::partials.contact_fields.phone')
        @include('contact::partials.contact_fields.email_address')
        @include('contact::partials.contact_fields.subject')
        @include('contact::partials.contact_fields.body')
        @include('contact::partials.contact_fields.accept_gdpr')
        
        {{--- TODO CAPTCHA --}}
        <button form="sendCoreMailingForm" role="button" type="submit" class="btn btn-primary mr-2 mb-2 mt-2">
            @lang('interaction.sendMailing')
        </button>
        @endif
    </form>
    </div>
</div>
@endsection