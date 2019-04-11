<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Very important !!
// use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use \Spatie\Permission\Traits\HasRoles;// <---------------------- and this one
use \Spatie\Permission\Models\Role;
use \Spatie\Permission\Models\Permission;

class UserTeam extends Model
{
    // // use CrudTrait;
    use HasRoles;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'user_team';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];

    protected $fillable = ['user_id', 'recruiter_id', 'networking_status', 'accepted_id', 'visibility_id', 'status_id'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = [
        'recruiter_id' => 'integer',
        'networking_status' => 'enum',
        'user_id' => 'integer',
        'accepted_id' =>'integer',
        'status_id' => 'boolean',
        'visibility_id' => 'boolean'
    ];

    public static $rules = [
        'user_id' => 'required|integer',
        'recruiter_id' => 'required|integer',
        'networking_status' => 'required|enum',
        'accepted_id' => 'required|integer',
        'status_id' => 'required|boolean',
        'visibility_id' => 'required|boolean'
    ];

    /***
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /***
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function recruiter(){
        return $this->belongsTo('App\Models\User', 'recruiter_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function accepted(){
        return $this->belongsTo('App\Models\Status', 'accepted_id');
    }

    public function visibility(){
        return $this->belongsTo('App\Models\Status', 'visibility_id');
    }

    public function status(){
        return $this->belongsTo('App\Models\Status', 'status_id');
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
