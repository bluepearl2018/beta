<?php

namespace Modules\UiTables\Entities;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;


class Organization extends Model
{
    // // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'organizations';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'organization_category_id',
        'target_role_id',
        'short_name',
        'name',
        'name_fr',
        'name_en',
        'name_es',
        'name_nl',
        'name_pt',
        'name_ru',
        'name_de',
        'name_it',
        'description_fr',
        'description_en',
        'description_nl',
        'description_es',
        'description_de',
        'description_it',
        'description_pt',
        'description_ru',
        'address1',
        'address2',
        'postal_code', 
        'city',
        'state',
        'country_id',
        'phone_number',
        'contact_name',
        'direct_email',
        'general_email',
        'website'];
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
    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }

    public function organization_category()
    {
        return $this->belongsTo('Modules\UiTables\Entities\OrganizationCategory', 'organization_category_id', 'id');
    }
    
    public function organization_target_role()
    {
        return $this->belongsTo('App\Models\Role', 'target_role_id', 'id');
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
