<?php

namespace Modules\UiTables\Entities;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;

class Tool extends Model
{
    // // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'tools';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'name', 'name_fr', 'name_en','name_nl','name_es','name_de','name_it','name_ru','name_pt',
        'description', 'description_fr', 'description_en','description_nl','description_es','description_de','description_it','description_ru','description_pt',
        'www', 'www_de', 'www_en', 'www_es', 'www_fr', 'www_it', 'www_nl', 'www_pt', 'www_ru'
    ];
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
