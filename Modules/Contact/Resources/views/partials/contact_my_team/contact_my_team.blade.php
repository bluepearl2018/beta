@extends('layouts.interaction')
@section('content')
<div class="container border-bottom border-left border-right py-3">
    @include('flash::message')
    <h1>
        <i class="fa fa-mail-bulk"></i>
        @lang('interaction.mailBulkTitle')
    </h1>
    <p class="lead">@lang('interaction.mailBulkLead')</p>
    <form id="sendMailingForm" action="{{route('post-team-mailing')}}" method="POST">
        <h2>Sélectionnez les destinataires de votre message</h2>
        <a class="btn btn-outline-secondary mr-2 mb-2" id="check-all" href="javascript:void(0);">Sélectionner tout</a>
        <a class="btn btn-outline-secondary mr-2 mb-2" id="uncheck-all" href="javascript:void(0);">Déselectionner tout</a> 
        @csrf
        @php($i = 1)
        @forelse($myTeam as $teamMember)
            <div class="row container mb-2">
                <div class="form-col">
                    <input type="checkbox" name="isMailable{{$i}}" unchecked/>
                    <input type="hidden" name="mailable[{{$i}}]" value="{{ Crypt::encrypt($teamMember->user->id) }}" />
                    {{ $teamMember->user->firstname }} {{ $teamMember->user->surname }}
                </div>
            </div>
            @php($i++)
        @empty
            <div class="row container mb-2">
                @lang('interface.noItemsToDisplay')
            </div>
        @endforelse
        @if(!empty($myTeam))
        <h2>Composez votre message</h2>
    
        @include('contact::partials.contact_fields.firstname')
        @include('contact::partials.contact_fields.surname')
        @include('contact::partials.contact_fields.phone')
        @include('contact::partials.contact_fields.email_address')
        @include('contact::partials.contact_fields.subject')
        @include('contact::partials.contact_fields.body')
        @include('contact::partials.contact_fields.accept_gdpr')
        
        {{--- TODO CAPTCHA --}}
        <button form="sendMailingForm" role="button" type="submit" class="btn btn-primary mr-2 mb-2 mt-2">
            @lang('interaction.sendMailing')
        </button>
        @endif
    </form>
    </div>
</div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#check-all').click(function(){
                $("input:checkbox").attr('checked', true);
            });
            $('#uncheck-all').click(function(){
                $("input:checkbox").attr('checked', false);
            });
        });
    </script>
@endsection