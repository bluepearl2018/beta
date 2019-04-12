<?php

namespace Modules\Account\Entities;

use App\User as OriginalUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Very important !!
// use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one

class User extends OriginalUser
{
    use Notifiable;
    // protected $guard_name = 'web'; // or whatever guard you want to use
    
    // // use CrudTrait; // <----- this
    use HasRoles; // <------ and this

    
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'users';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    
    protected $fillable = ['name', 'email', 'password', 'firstname', 'surname', 
    'country_id', 'VAT', 'register_as',  'general_terms', 'mother_language',
    'visibility_id', 'status_id'];

    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function openGoogle($crud = false)
    {
        return '<a class="btn btn-xs btn-default" target="_blank" 
        href="http://google.com?q='.urlencode($this->firstname).'+'.urlencode($this->surname).'" data-toggle="tooltip" title="Look for user in Google">
        <i class="fa fa-search"></i> Google it</a>';
    }

    public function checkVAT($crud = false)
    {
        return '<a class="btn btn-xs btn-default" target="_blank" 
        data-toggle="tooltip" title="Check VAT in VIES">
        href="http://ec.europa.eu/taxation_customs/vies/>
        <i class="fa fa-search"></i> Check VAT in VIES</a>';
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function permissionUsers()
    {
        return $this->hasMany(\App\Models\PermissionUser::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roleUsers()
    {
        return $this->hasMany(\App\Models\RoleUser::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphToMany
     **/
    public function jobs()
    {
        return $this->morphToMany(\Modules\Jobs\Entities\Jobs::class, 'jobs');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/

    public function userProfile()
    {
        return $this->hasOne(\Modules\Profile\Entities\UserProfile::class, 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'id');
    }

    public function languagePairs()
    {
        return $this->hasMany(\Modules\Profile\Entities\UserLanguagePair::class, 'user_id');
    }


    public function belongsToManyTeams()
    {
        return $this->belongsToMany('\Modules\Profile\Entities\UserTeam', 'user_id');
    }

    public function hasManyUsersInTeam(){
        return $this->hasMany('\Modules\Profile\Entities\UserTeam', 'recruiter_id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeActive($query)
    {
        return $query->where('status_id', 1);
    }

    /**
     * Scope a query to only include visible users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeVisible($query)
    {
        return $query->where('visibility_id', 1);
    }

    /**
     * Scope a query to only include premium users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopePremium($query)
    {
        return $query->where('premium_id', 1);
    }


    /**
     * Scope a query to only include premium exclusive users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopePremiumExclusive($query)
    {
        return $query->where('premium_exclusive_id', 1);
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
