<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserOrganization extends Model
{
    // // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'user_organization';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'id', 'user_id', 'organization_id', 
        'visibility_id', 'status_id'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'organization_id' => 'integer',
        'status_id' => 'boolean',
        'visibility_id' => 'boolean'
    ];

    public static $rules = [
        'user_id' => 'required|integer',
        'organization_id' => 'required|integer',
        'status_id' => 'required|boolean',
        'visibility_id' => 'required|boolean'
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
    public function organization(){
        return $this->belongsTo('Modules\UiTables\Entities\Organization', 'organization_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
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
    /**
     * Scope a query to only include active user organization
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeStatus($query)
    {
        return $query->where('status_id', 1);
    }

    /**
     * Scope a query to only include visible user organization
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeVisibility($query)
    {
        return $query->where('visibility_id', 1);
    }

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
