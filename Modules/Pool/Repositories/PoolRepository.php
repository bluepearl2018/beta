<?php

namespace Modules\Pool\Repositories;

use \Modules\Pool\Entities\Pool;

/**
 * Class PoolRepository
 * @package App\Repositories
 * @version November 24, 2018, 11:47 pm UTC
 *
 * @method Pool findWithoutFail($id, $columns = ['*'])
 * @method Pool find($id, $columns = ['*'])
 * @method Pool first($columns = ['*'])
*/
class PoolRepository extends Pool
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug',
        'name',
        'description',
        'keywords',
        'parent_id',
        'manager_id',
        'email_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pool::class;
    }
    
    public function showPool($slug)
    {
		return Pool::where('slug', $slug)->first();
    }
    
    public function showPoolCategory($poolCategory)
    {
        return Pool::where('slug', $poolCategory)->firstOrFail();
    }
    
    public function getPools()
    {
		return Pool::all();
    }
    
	public function getParentPool($poolSlug)
    {
        $parent_id = Pool::where('slug', $poolSlug)->firstOrFail()->pluck('id');
        return Pool::where('parent_id', $parent_id)->firstOrFail();
    }

    public function getParentPools()
    {
		return Pool::where('parent_id', NULL)->get();
    }
    
    public function getPoolCategories()
    {
		return Pool::where('parent_id', NULL)->get();
    }
    
    public function getRootPools()
    {
		return Pool::where('parent_id', NULL)->get();
    }

	public function getPoolByCode($poolSlug)
    {
		return Pool::where('slug', $poolSlug)->firstOrFail();
    }

    public function getMainPool($mainPoolParam)
    {
        return Pool::where('slug', $mainPoolParam)->firstOrFail();
        // dd($mainPoolParam);
    }

    public function getSubPools($mainPoolParam, $subPoolParam)
    {
        $mainPoolId = Pool::where('slug', $mainPoolParam)->firstOrFail()->pluck('id');
        return Pool::whereIn('parent_id', $mainPoolId)->get();
        // dd($subPoolParam);
    }

    public function getChildPool($subPoolParam)
    {
        if(Pool::where('slug', $subPoolParam)->firstOrFail())
        {
            return Pool::where('slug', $subPoolParam)->first();
        }
        
    }
    
    public function getChidrenPoolsByCode($mainpool)
    {
        if(Pool::where('slug', $mainpool)->firstOrFail()->pluck('id')){
            $parent_id = Pool::where('slug', $mainpool)->get()->pluck('id');
            return Pool::whereIn('parent_id', $parent_id)->get();    
        }
        
        // dd($pools);
	}
    
    public function getChidrenPoolsByCodeAsJson($mainpool)
    {
        if(Pool::where('slug', $mainpool)->firstOrFail()->pluck('id')){
            $parent_id = Pool::where('slug', $mainpool)->get()->pluck('id');
            return json_encode(Pool::whereIn('parent_id', $parent_id)->select('id', 'slug', 'name')->get());
        }
        
        // dd($pools);
	}
    public function TextTrans($text)
    {
        $locale = session('locale');
        $column = $text.'_'.$locale;
        return $column;
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get all menu items, in a hierarchical collection.
     * Only supports 2 levels of indentation.
     */
    public static function getTree()
    {
        $menu = Pool::orderBy('lft')->get();

        if ($menu->count()) {
            foreach ($menu as $k => $menu_item) {
                $menu_item->children = collect([]);

                foreach ($menu as $i => $menu_subitem) {
                    if ($menu_subitem->parent_id == $menu_item->id) {
                        $menu_item->children->push($menu_subitem);

                        // remove the subitem for the first level
                        $menu = $menu->reject(function ($item) use ($menu_subitem) {
                            return $item->id == $menu_subitem->id;
                        });
                    }
                }
            }
        }

        return $menu;
    }
}
