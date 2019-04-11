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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/uitables/tgtLangSelector/ajax/{sourceLang_id}',array('as'=>'tgtLangSelector.ajax','uses'=>'\Modules\UiTables\Http\Controllers\LanguagePairController@ajaxLangPairSelector'));
Route::get('/pools/poolSelector/ajax/{domain}',array('as'=>'ajaxPoolSelector.ajax','uses'=>'\Modules\Pool\Http\Controllers\PoolController@ajaxPoolSelector'));

