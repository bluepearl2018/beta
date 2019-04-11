<?php

namespace Modules\Profile\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSocialmedia extends Model
{
    // // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'user_socialmedia';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['user_id', 'socialmedia_id', 'account', 'status_id', 'visibility_id'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = [
        'socialmedia_id' => 'integer',
        'account' => 'string',
        'user_id' => 'integer',
        'status_id' => 'boolean',
        'visibility_id' => 'boolean'
    ];

    public static $rules = [
        'user_id' => 'required|integer',
        'socialmedia_id' => 'required|integer',
        'account' => 'required|string',
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
    public function socialmedia(){
        return $this->belongsTo('Modules\UiTables\Entities\Socialmedia', 'socialmedia_id');
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
     * Scope a query to only include active vendor socialmedia
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeStatus($query)
    {
        return $query->where('status_id', 1);
    }

    /**
     * Scope a query to only include visible socialmedia
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
