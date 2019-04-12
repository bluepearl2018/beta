@extends('contact::layouts.master')
@section('content')
    <h1>@lang('contact.contactTitle')</h1>
    <p class="lead">
           @lang('contacts.contactLead')
    </p>
    <div class="card-columns">
        @forelse($contactPages as $contactPage)
            @if($contactPage->slug == 'contact')
                @guest
                    <div class="card text-center">
                            <h6 class="card-header">
                                {{ $contactPage->title }}
                                <a href="/contact/{{ $contactPage->slug }}" style="text-decoration: none !important">
                                    <span class="fa fa-unlock text-green" style="color:green"></span>
                                </a>
                            </h6>
                            <a href="/contact/{{ $contactPage->slug }}" style="text-decoration: none !important">
                                <i class="fa fa-{{$contactPage->icon}} fa-3x d-block card-body text-muted"></i>
                            </a>
                        <div class="card-footer">
                           @lang('contacts.contactUs')
                        </div>
                    </div>
                @endguest
            @else
                <div class="card text-center">
                    <h6 class="card-header">
                            {{ $contactPage->title }}
                            <a href="/contact/{{ $contactPage->slug }}" class="text-dark">
                                @guest
                                    <span class="fa fa-lock text-danger" style="color:red"></span>
                                @else
                                    <span class="fa fa-unlock text-green" style="color:green"></span>
                                @endif
                            </a>
                    </h6>
                    <a href="/contact/{{ $contactPage->slug }}" style="text-decoration: none !important">
                        <i class="fa fa-{{$contactPage->icon}} fa-3x d-block card-body text-muted"></i>
                    </a>
                    @guest
                        <div class="card-footer">
                            @if(!Auth::check())@lang('contact.youMustBeRegistered')@endif
                        </div>
                    @endguest
                </div>
            @endif
        @empty
            <div class="card body">
                @lang('interface.noItemsToDisplay')
            </div>
        @endforelse
    </div>
    @stop
