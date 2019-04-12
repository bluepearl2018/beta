<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['auth'],
    'namespace'  => '\App\Http\Controllers\Admin',
], function () { 
    
    /**
     * custom admin routes 
     * 
     */ 
    CRUD::resource('/user', '\Modules\Account\Http\Controllers\UserCrudController');
    CRUD::resource('/role', '\Modules\Account\Http\Controllers\RoleCrudController');
    CRUD::resource('/permission', '\Modules\Account\Http\Controllers\PermissionCrudController');
    
    CRUD::resource('/blog/articles', '\Modules\Blog\Http\Controllers\BlogArticleCrudController');

    CRUD::resource('/pages', '\Modules\Pages\Http\Controllers\PagesAdminController');
    CRUD::resource('/uitables/gender', '\Modules\UiTables\Http\Controllers\GenderAdminController');
    
    CRUD::resource('/pools', '\Modules\Pool\Http\Controllers\PoolAdminController');
    
    CRUD::resource('/pools/pool-managers', '\Modules\Pool\Http\Controllers\PoolManagersAdminController');
}); // this should be the absolute last line of this file