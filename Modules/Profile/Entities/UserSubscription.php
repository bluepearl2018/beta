<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;

class UserSubscription extends Model
{
    // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'user_subscription';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    
    protected $fillable = ['user_id', 'subscription_id', 'status_id', 'visibility_id'];

    protected $casts = [
        'subscription_id' => 'integer',
        'user_id' => 'integer',
        'status_id' => 'boolean',
        'visibility_id' => 'boolean'
    ];

    public static $rules = [
        'user_id' => 'required|integer',
        'subscription_id' => 'required|integer',
        'status_id' => 'required|boolean',
        'visibility_id' => 'required|boolean'
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
