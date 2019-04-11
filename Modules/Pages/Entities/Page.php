<?php

namespace Modules\Pages\Entities;
use \Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use \Backpack\CRUD\CrudTrait;
// use \Spatie\Sluggable\HasSlug;
// use \Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    // use HasSlug;
    use CrudTrait;
    use HasTranslations;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'pages';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $hidden = [];
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['title', 'slug', 'lead', 'content', 'image', 'meta', 'parent_id', 'status'];
    protected $translatable = ['title', 'lead', 'content'];
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function parent(){
        return $this->belongsTo('Modules\Pages\Entities\Page', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Modules\Pages\Entities\Page', 'parent_id');
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