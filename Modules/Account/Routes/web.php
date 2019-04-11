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
Route::prefix('account')->group(function() {
    Route::get('/', ['uses' => 'AccountController@index'])->middleware('auth', 'verified');
    Route::get('create', ['uses' => 'AccountController@create'])->middleware('auth', 'verified');
    Route::get('edit', ['uses' => 'AccountController@edit'])->middleware('auth', 'verified');
    Route::post('edit', ['uses' => 'AccountController@update'])->middleware('auth', 'verified');
    Route::post('store', ['uses' => 'AccountController@store'])->middleware('auth', 'verified');
    Route::post('visibility-off', ['uses' => 'AccountController@visibilityOff'])->middleware('auth', 'verified');
    Route::post('visibility-on', ['uses' => 'AccountController@visibilityOn'])->middleware('auth', 'verified');
    Route::post('status-on', ['uses' => 'AccountController@statusOn'])->middleware('auth', 'verified');
    Route::post('status-off', ['uses' => 'AccountController@statusOff'])->middleware('auth', 'verified');
    Route::post('delete', ['uses' => 'AccountController@deleteAccount'])->middleware('auth', 'verified');    
});
