<?php

/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
|
| Here is where you can register back routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "back" middleware group. Now create something great!
|
*/


Auth::routes();
Route::resource('/admin', 'Admin\BackController');
Route::resource('/admin/blocks', 'Admin\BackController');
Route::resource('/admin/blog', 'Admin\BackController');
Route::resource('/admin/contact', 'Admin\BackController');
Route::resource('/admin/pages', 'Admin\BackController');
Route::resource('/admin/uitables', 'Admin\BackController');

