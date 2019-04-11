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

    Route::get('/pools', 'PoolController@index');
    Route::post('/pools', 'PoolController@applyToManageAPool')->name('manage-this-pool');
    Route::get('/pools/{category}/{slug}', 'PoolController@showPool', function($category, $slug = NULL){
        return $slug;
    });
    /**
     * Pools by Domain
     */ 
    Route::get('/pools/{domain?}', 'PoolController@showPoolsByDomain', function($domain = NULL){
        return $domain;
    });

    /***
     * Category Routes
    Route::get('/{category}', 'PoolController@showPoolCategory', function($category){
        return $slug;
    });
     */ 

    Route::get('/pool-selector/ajax/{domain}', 'PoolController@ajaxPoolSelector', function($domain = null){
        return $domain;
    });

