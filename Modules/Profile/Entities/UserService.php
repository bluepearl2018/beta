<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserService extends Model
{
    // // use CrudTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'user_service';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'service_id',
        'user_id',
        'min_rate',
        'max_rate',
        'status_id',
        'visibility_id'
    ];

    protected $casts = [
        'service_id' => 'integer',
        'user_id' => 'integer',
        'min_rate' => 'float',
        'max_rate' => 'float',
        'status_id' => 'boolean',
        'visibility_id' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'service_id' => 'required|integer',
        'user_id' => 'required|integer',
        'min_rate' => 'numeric|min:1|max:6',
        'max_rate' => 'numeric|min:1|max:6',
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
    public function service(){
        return $this->belongsTo('App\Models\Service', 'service_id');
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
     * Scope a query to only include active user pool
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeStatus($query)
    {
        return $query->where('status_id', 1);
    }

    /**
     * Scope a query to only include visible user pool
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
