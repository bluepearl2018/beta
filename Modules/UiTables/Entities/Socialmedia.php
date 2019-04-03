<?php

namespace Modules\UiTables\Entities;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;


class Socialmedia extends Model
{
    // // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'socialmedias';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'name_fr', 'name_en','name_nl','name_es','name_de','name_it','name_ru','name_pt',
    'description', 'description_fr', 'description_en','description_nl','description_es','description_de','description_it','description_ru','description_pt',
    'url', 'url_fr', 'url_en','url_nl','url_es','url_de','url_it','url_ru','url_pt'];
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
