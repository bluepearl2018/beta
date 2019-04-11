@extends('layouts.pools')
@if(Article::where('slug', 'profile')->first())
@php($metadata = Article::where('slug', '=', 'profile')->first())
@endif
@section('pageTitle')
@parent
@isset($metadata)
    {{ json_decode($metadata->extras)->meta_title }}
@endisset
@endsection
@section('pageDescription')
@parent
@isset($metadata)
    {{ json_decode($metadata->extras)->meta_description }}
@endisset
@endsection

@section('content')
@include('flash::message')
    <div class="row no-gutters">{{-- Part with interaction options --}}
        {{-- Part with user Info --}}
        <div class="col-12 py-2">
            @if(!$selectedUser->email_verified_at)
            <span><i class="fa fa-exclamation-circle text-danger"></i>
                <small>@lang('users.userEmailNotVerified')</small>
            </span>
            @elseif($selectedUser->email_verified_at)
            <span><i class="fa fa-exclamation-circle text-success"></i>
                <small>@lang('users.userEmailVerified')</small>
            </span>
            @endif
            <h1>
                <span class="fa fa-user-circle"></span>
                {{ $selectedUser->firstname }} {{ $selectedUser->surname }}
            </h1>
            <nav class="nav border-top border-bottom py-1 my-2">
                {{-- LEs fonctions sont activées 
                    // selon le niveau d'itneraction associé au profil
                    // selon le rôle 
                    // selon le niveau d'abonnement
                    // L'incomplétude du profil est rédhibitoire est condamne toute possibilité d'interaction --}}
                <div class="nav-item mr-2">
                    @auth
                        @isset($userPool)
                        @if(!empty($userPool))
                        @component('users.user_interactions.user_request_for_quote', [
                            'selectedUser' => $selectedUser,
                            'userPool' => $userPool
                            ])@endcomponent
                        @endif
                        @endisset
                    @endauth
                </div>
                <div class="nav-item mr-2">
                    @auth
                        @component('contacts.contact_user.contact_user_btn_form', 
                        ['selectedUser' => $selectedUser])@endcomponent
                    @endauth
                </div>
                <div class="nav-item">
                    {{-- TODO Recruitment action depending on role --}}
                    @component('users.user_interactions.user_interaction_add_to_my_team',  ['selectedUser' => $selectedUser])@endcomponent
                </div>
            </nav>
            <p class="lead">
                @lang('users.tipAccountPublicInfo') 
            </p>
            @include('users.users_profile.users_profile_nav_links_users')
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
                    <!-- User Profile -->
                    @if($selectedUser->visibility_id == '0')
                        <p class="alert alert-info">
                            @lang('profile.contactDataHidden')
                        </p>
                        @else
                        @include('users.users_profile.users_profile_details', with(compact('selectedProfile')))
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-language-pairs" role="tabpanel" aria-labelledby="pills-language-pairs-tab">
                    <!-- Language Pairs -->
                    @include('users.user_language_pairs.table', with(compact('countVisibleLanguagePairs')))
                </div>
                <div class="tab-pane fade" id="pills-social-medias" role="tabpanel" aria-labelledby="pills-social-medias-tab">
                    <!-- Social Medias -->
                    @include('users.user_socialmedia.table', with(compact('countVisibleSocialmedias')))
                </div>
                <div class="tab-pane fade" id="pills-tools" role="tabpanel" aria-labelledby="pills-tools-tab">
                    <!-- Tools -->
                    @include('users.user_tools.table', with(compact('countVisibleTools')))
                </div>
                <div class="tab-pane fade" id="pills-pools" role="tabpanel" aria-labelledby="pills-pools-tab">
                    <!-- Pools -->
                    @include('users.user_pools.table', with(compact('countVisiblePools')))
                </div>
                <div class="tab-pane fade" id="pills-organizations" role="tabpanel" aria-labelledby="pills-organizations-tab">
                    <!-- Organizations -->
                    @include('users.user_organizations.table', with(compact('countVisibleOrganizations')))
                </div>
                <div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab">
                    <!-- Files -->
                    @include('users.user_files.table', with(compact('countVisibleFiles')))
                </div>
                <div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab">
                    <!-- Files -->
                    @include('users.user_services.table', with(compact('countVisibleServices')))
                </div>
                <div class="tab-pane fade" id="pills-certificates" role="tabpanel" aria-labelledby="pills-certificates-tab">
                    <!-- Files -->
                    @include('users.user_certificates.table', with(compact('countVisibleCertificates')))
                </div>
            </div>
        </div>
        
    </div>
@endsection