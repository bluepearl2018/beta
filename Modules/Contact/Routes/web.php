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

Route::prefix('contact')->group(function() {
    Route::get('/', 'ContactController@index');
        
    /***
    |---------------- ANONYMOUS CONTACTS ------------------------
    | Routes to contact Eutranet
    */

    Route::get('contact', 'ContactController@getContact')->name('contact-get');
    Route::post('contact', 'ContactController@postContact')->name('contact-post');

    /***
    |---------------- FOR REGISTERED USERS ------------------------
    | Routes to contact the core TEAM, must be authed & verified
    */

    Route::get('contact-core', 'ContactController@getCoreMailing')->name('contact-core-get');
    Route::post('contact-core', 'ContactController@postCoreMailing')->name('contact-core-post');
    
    /***
    |---------------- FOR REGISTERED USERS ------------------------
    | Routes to contact Eutranet, must be authed & verified
    */

    Route::get('contact-eutranet', 'ContactController@getContactEutranet')->name('contact-eutranet-get');
    Route::post('contact-eutranet', 'ContactController@postContactEutranet')->name('contact-eutranet-post');


    /***
    |---------------- FOR REGISTERED USERS ------------------------
    | Routes to send a mailing to MY TEAM, must be authed & verified
    */

    Route::get('contact-my-team', 'ContactController@getTeamMailing')->name('get-team-mailing');
    Route::post('contact-my-team', 'ContactController@postTeamMailing')->name('post-team-mailing');


    /***
    |---------------- SEND A MAILING TO WEBMASTER ---------------------
    | Routes to contact the webmaster, must be authed & verified
    */

    Route::get('contact-webmaster', 'ContactController@getContactWebmaster')->name('contact-webmaster-get');
    Route::post('contact-webmaster', 'ContactController@postContactWebmaster')->name('contact-webmaster-post');

    /***
    |---------------- CONTACT USERS ------------------------
    | Routes to contact other users from their profile
    | User MUST be authenticated and email must be verified
    */

    Route::post('contact-user', 'ContactController@contactUser')->name('contact-user')->middleware('auth', 'verified', 'role:premium|premium-exclusive|admin');
    Route::post('contact-user/send', 'ContactController@sendMessageToUser')->name('send-message-to-user')->middleware('auth', 'verified', 'role:premium|premium-exclusive|admin');
    Route::get('contact-user/sent', 'ContactController@messageToUserSent')->name('message-to-user-sent')->middleware('auth', 'verified', 'role:premium|premium-exclusive|admin');

    /***
    |---------------- CONTACT POOL MANAGERS ------------------------
    | Routes to contact other users from their profile
    | User MUST be authenticated and email must be verified
    */

    Route::post('contact-pool-manager/{pool}/{sourcelanguage}', 'ContactController@contactPoolManagerByLanguage')->name('contact-manager');
    Route::get('contact-pool-manager', 'ContactController@contactPoolManager')->name('contact');
    Route::post('contact-pool-manager', 'ContactController@contactPoolManager')->name('contact');

});
