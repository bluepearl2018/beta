<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Role as OriginalRole;
use Spatie\Permission\Models\Permission as OriginalPermission;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
// use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;
use Spatie\Translatable\HasTranslations;
use Backpack\CRUD\CrudTrait;

class Permission extends OriginalPermission 
{
    

    // use Sluggable;
    // use SluggableScopeHelpers;use HasTranslations;
    use CrudTrait;

    
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'permissions';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'title', 'slug', 'level'];
    protected $translatable = ['title', 'description'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
