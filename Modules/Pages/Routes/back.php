<?php

/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
|
| Here is where you can register back routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "back" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function() {
    Route::resource('/pages/admin', 'PagesAdminController')->middleware('back');
});