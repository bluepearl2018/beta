<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTool extends Model
{
    // // use CrudTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'user_tool';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];

    protected $fillable = ['tool_id', 'user_id', 'visibility_id', 'status_id'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = [
        'tool_id' => 'integer',
        'user_id' => 'integer',
        'status_id' => 'boolean',
        'visibility_id' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tool_id' => 'integer',
        'user_id' => 'integer',
        'status_id' => 'boolean',
        'visibility_id' => 'boolean'
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
    public function tool(){
        return $this->belongsTo('Modules\UiTables\Entities\Tool', 'tool_id');
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
