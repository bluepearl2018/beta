<?php

namespace Modules\Pages\Repositories;

use Modules\Pages\Entities\Page;

class PageRepository extends Page
{
    protected function model()
    {
        return Page::all();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getLatestPage()
    {
        return Page::OrderBy('created_at', 'desc')->first();
    }
    
    public function showPage($slug)
    {
        return Page::where('slug', '=', $slug)->first();
    }
    public function showWelcomePage($slug){
        if(Page::where('slug', '=', 'welcome')->first()){
            return Page::where('slug', '=', 'welcome')->first();
        }
        else return Page::where('slug')->firstOrFail();
    }
    public function showPageCategory($pageCategory)
    {
        return Page::where('slug', $pageCategory)->first();
    }
    
    /**
     * Get first level items
     */
    public static function getPageCategories()
    {
        return Page::where('parent_id', NULL)->orderBy('title', 'ASC')->get();
    }
    
    /**
     * Get all menu items, in a hierarchical collection.
     * Only supports 2 levels of indentation.
     */
    public static function getPageList()
    {
        $pageList = self::orderBy('lft')->get();

        if ($pageList->count()) {
            foreach ($pageList as $k => $pageList_item) {
                $pageList_item->children = collect([]);

                foreach ($pageList as $i => $pageList_subitem) {
                    if ($pageList_subitem->parent_id == $pageList_item->id) {
                        $pageList_item->children->push($pageList_subitem);

                        // remove the subitem for the first level
                        $pageList = $pageList->reject(function ($item) use ($pageList_subitem) {
                            return $item->id == $pageList_subitem->id;
                        });
                    }
                }
            }
        }

        return $pageList;
    }
    
    public function getParentCategory($slug)
    {
        $parentCategory = self::where('slug', $slug)->parent->first();
        return $parentCategory;
    }
    /**
     * Get a Page by Slug
     */
    public function getPageBySlug($slug)
    {
        return Page::where('slug', $slug)->first();
    }
}