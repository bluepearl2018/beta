<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;

class UserMessage extends Model
{
    // // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'user_messages';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];

    protected $fillable = ['user_id', 'recipient_id', 'flagged_id', 'created_at', 'read_at', 'subject', 'body', 'deleted_at'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = [
        'user_id' => 'integer',
        'recipient_id' => 'integer',
        'flagged_id' => 'boolean',
        'created_at' => 'date',
        'deleted_at' => 'date',
        'read_at' =>'date',
        'subject' => 'string',
        'body' => 'text'
    ];

    public static $rules = [
        //
    ];

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

    public function recipient(){
        return $this->belongsTo('Modules\Profile\Entities\User', 'user_id');
    }

    public function user(){
        return $this->belongsTo('Modules\Profile\Entities\User', 'user_id');
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
