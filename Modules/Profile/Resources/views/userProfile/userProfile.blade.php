<div class="row-fluid no-gutters clearfix">
	<h1>
		<i class="fa fa-user-circle"></i>
		<strong>{!! $selectedUser->firstname !!} {!! $selectedUser->surname !!}</strong>
	</h1>
	@if($userProfile->description)
		<p class="lead">
			{!! $userProfile->description !!}
		</p>
	@endif
</div>
<div class="row-fluid no-gutters clearfix">
	@include('account::show')
</div>
<div class="row-fluid no-gutters">
		@component('profile::userLanguagePairs.user_language_pairs', [
			'selectedUser' => $selectedUser,
			'userProfile' => $userProfile,
			'userLanguagePairs' => $userLanguagePairs,
			'countLanguagePairs' => $countLanguagePairs,
			'countVisibleLanguagePairs' => $countVisibleLanguagePairs,
			])@endcomponent
</div>
<div class="row-fluid no-gutters clearfix">
		@component('profile::userPools.user_pools', [
			'selectedUser' => $selectedUser,
			'userProfile' => $userProfile,
			'userPools' => $userPools,
			'countPools' => $countPools,
			'countVisiblePools' => $countVisiblePools
			])@endcomponent
</div>
<div class="row-fluid no-gutters clearfix">
		@component('profile::userSocialmedias.user_socialmedia', [
			'selectedUser' => $selectedUser,
			'userProfile' => $userProfile,
			'userSocialmedias' => $userSocialmedias,
			'countSocialmedias' => $countSocialmedias,
			'countVisibleSocialmedias' => $countVisibleSocialmedias
			])
		@endcomponent
</div>
<div class="row-fluid no-gutters clearfix">
		@component('profile::userFiles.user_files', [
			'selectedUser' => $selectedUser,
			'userProfile' => $userProfile,
			'userFiles' => $userFiles,
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
		@component('profile::userServices.user_services', [
			'selectedUser' => $selectedUser,
			'userProfile' => $userProfile,
			'userServices' => $userServices,
			'countServices' => $countServices,
			'countVisibleServices' => $countVisibleServices,
			])@endcomponent
</div>
<div class="row-fluid no-gutters clearfix">
		@component('profile::userTools.user_tools', [
			'selectedUser' => $selectedUser,
			'userProfile' => $userProfile,
			'userTools' => $userTools,
			'countTools' => $countTools,
			'countVisibleTools' => $countVisibleTools,
			])@endcomponent
</div>
<div class="row-fluid no-gutters clearfix">
		@component('profile::userOrganizations.user_organizations', [
		'selectedUser' => $selectedUser,
		'userProfile' => $userProfile,
		'userOrganizations' => $userOrganizations,
		'countOrganizations' => $countOrganizations,
		'countVisibleOrganizations' => $countVisibleOrganizations,
		])@endcomponent
</div>