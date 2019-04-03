<?php

namespace Modules\Blog\Repositories;

use \Modules\Blog\Entities\Article;

class BlogRepository extends Article
{
    protected function model()
    {
        return Article::all();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getLatestArticle()
    {
        return Article::OrderBy('created_at', 'desc')->first();
    }
    
    public function showArticle($slug)
    {
        return Article::where('slug', '=', $slug)->first();
    }
    
    public function showArticleCategory($blogCategory)
    {
        return Article::where('slug', $blogCategory)->first();
    }
    
    /**
     * Get first level items
     */
    public static function getArticleCategories()
    {
        return Article::where('parent_id', NULL)->orderBy('title', 'ASC')->get();
    }
    
    /**
     * Get all menu items, in a hierarchical collection.
     * Only supports 2 levels of indentation.
     */
    public static function getArticleList()
    {
        $blogList = self::orderBy('lft')->get();

        if ($blogList->count()) {
            foreach ($blogList as $k => $blogList_item) {
                $blogList_item->children = collect([]);

                foreach ($blogList as $i => $blogList_subitem) {
                    if ($blogList_subitem->parent_id == $blogList_item->id) {
                        $blogList_item->children->push($blogList_subitem);

                        // remove the subitem for the first level
                        $blogList = $blogList->reject(function ($item) use ($blogList_subitem) {
                            return $item->id == $blogList_subitem->id;
                        });
                    }
                }
            }
        }

        return $blogList;
    }
    
    public function getParentCategory($slug)
    {
        $parentCategory = self::where('slug', $slug)->parent->first();
        return $parentCategory;
    }
    /**
     * Get a Article by Slug
     */
    public function getArticleBySlug($slug)
    {
        return Article::where('slug', $slug)->first();
    }
}