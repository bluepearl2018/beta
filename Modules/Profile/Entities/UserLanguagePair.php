<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLanguagePair extends Model
{
    // // use CrudTrait;
    use SoftDeletes;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'user_language_pairs';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    
    protected $fillable = ['user_id', 'sourceLang_id', 'targetLang_id', 'status_id', 'visibility_id'];
    // protected $hidden = [];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'sourceLang_id' => 'integer',
        'targetLang_id' => 'integer',
        'status_id' => 'boolean',
        'visibility_id' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'sourceLang_id' => 'required|integer',
        'targetLang_id' => 'required|integer',
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
    public function srcLang(){
        return $this->belongsTo('Modules\UiTables\Entities\Sourcelanguage', 'sourceLang_id');
    }
    // alias
    public function sourcelanguage(){
        return $this->belongsTo('Modules\UiTables\Entities\Sourcelanguage', 'sourceLang_id');
    }

    public function tgtLang(){
        return $this->belongsTo('Modules\UiTables\Entities\Targetlanguage', 'targetLang_id');
    }
    // alias
    public function targetlanguage(){
        return $this->belongsTo('Modules\UiTables\Entities\Targetlanguage', 'targetLang_id');
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
     * Scope a query to only include active vendor language Pairs
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeStatus($query)
    {
        return $query->where('status_id', 1);
    }

    /**
     * Scope a query to only include visible vendor language Pairs.
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
