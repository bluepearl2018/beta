<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;
use Spatie\Translatable\HasTranslations;
use Backpack\CRUD\CrudTrait;

class UserProfile extends Model
{
     use CrudTrait;
    // use Sluggable;
    // use SluggableScopeHelpers;
    use HasTranslations;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'users_profile';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    
    protected $fillable = [
        'user_id',
        'gender_id',
        'address1',
        'address2',
        'postal_code',
        'city',
        'state',
        'country_id',
        'phone',
        'mobile',
        'secondaryemail',
        'VAT',
        'description', 
        'short_description'
    ];

    protected $translatable = [
        'description', 'short_description'
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
    public function gender(){
        return $this->belongsTo('\App\Models\Gender');
    }

    public function country(){
        return $this->belongsTo('\App\Models\Country');
    }
    
    public function user(){
        return $this->hasOne('\App\Models\User');
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
