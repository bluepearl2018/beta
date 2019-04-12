<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

        Route::get('/profile', 'ProfileController@index');
        Route::post('/profile/show-public-profile', 'ProfileController@showPublicProfile')->name('show-public-profile');
        
        Route::resource('/profile/users-language-pairs', 
        'UserLanguagePairController', 
        [
            'name' => ['users-language-pairs'],
            'only' => ['index', 'create', 'store', 'destroy', 'toggleVisibility', 'toggleStatus']])
            ->middleware(['auth', 'verified', 'role:translator|permission:access-language-pairs']);

        Route::resource('/profile/users-social-medias', 
        'UserSocialMediaController',
        [
            'name' => 'users-social-medias',
            'only' => ['index', 'create', 'store', 'destroy', 'toggleVisibility', 'toggleStatus']])
            ->middleware(['auth', 'verified', 'permission:access-social-medias']);

        /***
         *  Users Subscriptions Routes
         * */ 
        Route::resource('/profile/users-subscriptions', 
        'UserSubscriptionController',
        [
            'name' => 'users-subscriptions',
            'only' => ['index', 'destroy', 'toggleVisibility', 'toggleStatus']])
            ->middleware(['auth', 'verified', 'permission:access-subscriptions']);

        /***
         *  Users Services Routes
         * */ 
        Route::resource('/profile/users-services', 
        'UserServiceController',
        [
            'name' => 'users-services',
            'only' => ['index', 'create', 'store', 'destroy', 'toggleVisibility', 'toggleStatus']])->middleware(['auth', 'verified']);

        /***
         *  Users Files Routes
         * */ 
        Route::resource('/profile/users-files', 
        'UserFileController',
        [
            'name' => 'users-files',
            'only' => ['index', 'create', 'store', 'destroy', 'toggleVisibility', 'toggleStatus']])->middleware(['auth', 'verified']);
        Route::post('/profile/users-files/download-user-file', 'UserFileController@downloadUserFile')->name('download-user-file');

        /***
         *  Users Pools Routes
         * */         
        Route::resource('/profile/users-pools', 
        'UserPoolController',
        [
            'name' => 'users-pools',
            'only' => ['index', 'create', 'store', 'destroy', 'toggleVisibility', 'toggleStatus']])->middleware(['auth', 'verified']);

        Route::resource('/profile/users-tools', 
        'UserToolController',
        [
            'name' => 'users-tools',
            'only' => ['index', 'create', 'store', 'destroy', 'toggleVisibility', 'toggleStatus']])->middleware(['auth', 'verified']);

        Route::post('/profile/users-certificates/download-user-certificate', 'UserCertificateController@downloadUserCertificate')->name('download-user-certificate');
        Route::resource('/profile/users-certificates', 
        'UserCertificateController',
        [
            'name' => 'users-certificates',
            'only' => ['index', 'create', 'store', 'destroy', 'toggleVisibility', 'toggleStatus']])->middleware(['auth', 'verified']);

        Route::resource('/profile/users-organizations', 
        'UserOrganizationController', 
        [
            'name' => 'users-organizations',
            'only' => ['index', 'create', 'store', 'destroy', 'toggleVisibility', 'toggleStatus']])->middleware(['auth', 'verified']);

        // TODO Add to use case, since this route is intended to suggest an organization if it is not been listed yet
        Route::get('/profile/users-organizations/suggest', 'UserOrganizationController@suggest')->middleware(['auth', 'verified']);

        /**************************************************
        |                   TOOLBOX GDPR                   |
        ***************************************************/
        Route::post('/profile/users-organizations/toggle-visibility', 'UserOrganizationController@toggleVisibility')->middleware(['auth', 'verified']);
        Route::post('/profile/users-organizations/toggle-status', 'UserOrganizationController@toggleStatus')->middleware(['auth', 'verified']);
        Route::post('/profile/users-language-pairs/toggle-visibility', 'UserLanguagePairController@toggleVisibility')->middleware(['auth', 'verified']);
        Route::post('/profile/users-language-pairs/toggle-status', 'UserLanguagePairController@toggleStatus')->middleware(['auth', 'verified']);
        Route::post('/profile/users-pools/toggle-visibility', 'UserPoolController@toggleVisibility')->middleware(['auth', 'verified']);
        Route::post('/profile/users-pools/toggle-status', 'UserPoolController@toggleStatus')->middleware(['auth', 'verified']);
        Route::post('/profile/users-social-medias/toggle-visibility', 'UserSocialmediaController@toggleVisibility')->middleware(['auth', 'verified']);
        Route::post('/profile/users-social-medias/toggle-status', 'UserSocialmediaController@toggleStatus')->middleware(['auth', 'verified']);
        Route::post('/profile/users-tools/toggle-visibility', 'UserToolController@toggleVisibility')->middleware(['auth', 'verified']);
        Route::post('/profile/users-tools/toggle-status', 'UserToolController@toggleStatus')->middleware(['auth', 'verified']);
        Route::post('/profile/users-services/toggle-visibility', 'UserServiceController@toggleVisibility')->middleware(['auth', 'verified']);
        Route::post('/profile/users-services/toggle-status', 'UserServiceController@toggleStatus')->middleware(['auth', 'verified']);
        Route::post('/profile/users-files/toggle-visibility', 'UserFileController@toggleVisibility')->middleware(['auth', 'verified']);
        Route::post('/profile/users-files/toggle-status', 'UserFileController@toggleStatus')->middleware(['auth', 'verified']);
        Route::post('/profile/users-certificates/toggle-visibility', 'UserCertificateController@toggleVisibility')->middleware(['auth', 'verified']);
        Route::post('/profile/users-certificates/toggle-status', 'UserCertificateController@toggleStatus')->middleware(['auth', 'verified']);
