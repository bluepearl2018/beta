<?php

namespace Modules\UiTables\Entities;

use Illuminate\Database\Eloquent\Model;
use Organization;

class OrganizationCategory extends Model
{
    // // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'organization_categories';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'slug', 'name', 'name_fr', 'name_en', 'name_nl', 'name_es', 'name_de', 'name_it', 'name_pt', 'name_ru', 
        'description', 'description_fr', 'description_en', 'description_nl', 'description_es', 'description_de', 'description_it', 'description_pt', 'description_ru',
        'target_role_id'
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
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function organizations()
    {
        return $this->hasMany('\Modules\UiTables\Entities\Organization', 'id');
    }
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
