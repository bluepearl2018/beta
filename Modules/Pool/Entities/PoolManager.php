<?php

namespace Modules\Pool\Entities;

use Illuminate\Database\Eloquent\Model;

class PoolManager extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'pool_managers';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [    
        'manager_id',
        'email_id',
        'language_id',
        'pool_id',
        'status_id',
        'user_id',
        'visibility_id',
    ];
    // protected $hidden = [];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function manager()
    {
        return $this->belongsTo(\App\Models\User::class, 'manager_id');
    }

    public function email()
    {
        return $this->belongsTo(\App\Models\Email::class, 'email_id');
    }
    
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function userProfile()
    {
        return $this->belongsTo(\App\Models\User::class, 'manager_id');
    }

    public function language()
    {
        return $this->belongsTo(\Modules\UiTables\Entities\Sourcelanguage::class, 'language_id');
    }
    
    public function pool()
    {
        return $this->belongsTo(\Modules\Pool\Entities\Pool::class, 'pool_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id');
    }
    
    public function visibility()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id');
    }
}
