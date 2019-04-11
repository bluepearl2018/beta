@extends('home')
@section('aside')
    New meny
@endsection
@section('content')
<div class="container-fluid">
    @include('flash::message')
    <h1>@lang('profile.profileTitle')</h1>
    <p class="lead">@lang('profile.profileLead')</p>
    <div class="clearfix"></div>
    <div class="row-fluid no-gutters clearfix">
        @include('account::publicProfile.showPublicProfile')
    </div>
    <div class="row-fluid no-gutters">
            @component('profile::userLanguagePairs.user_language_pairs',
                $userLanguagePairs, [
                'selectedUser' => $selectedUser,
                'userProfile' => $userProfile,
                'countLanguagePairs' => $countLanguagePairs,
                'countVisibleLanguagePairs' => $countVisibleLanguagePairs,
                ])@endcomponent
    </div>
    <div class="row-fluid no-gutters clearfix">
            @component('profile::userPools.user_pools', $userPools, [
                'selectedUser' => $selectedUser,
                'userProfile' => $userProfile,
                'countPools' => $countPools,
                'countVisiblePools' => $countVisiblePools
                ])@endcomponent
    </div>
    <div class="row-fluid no-gutters clearfix">
            @component('profile::userSocialmedias.user_socialmedia', $userSocialmedias,[
                'selectedUser' => $selectedUser,
                'userProfile' => $userProfile,
                'countSocialmedias' => $countSocialmedias,
                'countVisibleSocialmedias' => $countVisibleSocialmedias
                ])
            @endcomponent
    </div>
    <div class="row-fluid no-gutters clearfix">
            @component('profile::userFiles.user_files', $userFiles, [
                'selectedUser' => $selectedUser,
                'userProfile' => $userProfile,
                'countFiles' => $countFiles,
                'countVisibleFiles' => $countVisibleFiles,
                ])@endcomponent
    </div>
    <div class="row-fluid no-gutters">
            @component('profile::userCertificates.user_certificates', [
                'selectedUser' => $selectedUser,
                'userProfile' => $userProfile,
                'userCertificates' => $userCertificates,
                'countCertificates' => $countCertificates,
                'countVisibleCertificates' => $countVisibleCertificates,
                ])@endcomponent
    </div>
    <div class="row-fluid no-gutters">
            @component('profile::userServices.user_services', $userServices, [
                'selectedUser' => $selectedUser,
                'userProfile' => $userProfile,
                'countServices' => $countServices,
                'countVisibleServices' => $countVisibleServices,
                ])@endcomponent
    </div>
    <div class="row-fluid no-gutters clearfix">
            @component('profile::userTools.user_tools',$userTools, [
                'selectedUser' => $selectedUser,
                'userProfile' => $userProfile,
                'countTools' => $countTools,
                'countVisibleTools' => $countVisibleTools,
                ])@endcomponent
    </div>
    <div class="row-fluid no-gutters clearfix">
            @component('profile::userOrganizations.user_organizations', $userOrganizations, [
            'selectedUser' => $selectedUser,
            'userProfile' => $userProfile,
            'countOrganizations' => $countOrganizations,
            'countVisibleOrganizations' => $countVisibleOrganizations,
            ])@endcomponent
    </div>
</div>
@endsection