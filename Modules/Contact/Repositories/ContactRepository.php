<?php

namespace Modules\Contact\Repositories;

use \Modules\Contact\Entities\Contact;

class ContactRepository extends Contact
{
    protected function model()
    {
        return Contact::all();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function showContact($slug)
    {
        return Contact::where('slug', '=', $slug)->first();
    }
    
    public function showContactCategory($contactCategory)
    {
        return Contact::where('slug', $contactCategory)->first();
    }
    
    /**
     * Get first level items
     */
    public static function getContactCategories()
    {
        return Contact::where('parent_id', NULL)->orderBy('title', 'ASC')->get();
    }
    
    /**
     * Get all menu items, in a hierarchical collection.
     * Only supports 2 levels of indentation.
     */
    public static function getContactList()
    {
        $contactList = self::orderBy('lft')->get();

        if ($contactList->count()) {
            foreach ($contactList as $k => $contactList_item) {
                $contactList_item->children = collect([]);

                foreach ($contactList as $i => $contactList_subitem) {
                    if ($contactList_subitem->parent_id == $contactList_item->id) {
                        $contactList_item->children->push($contactList_subitem);

                        // remove the subitem for the first level
                        $contactList = $contactList->reject(function ($item) use ($contactList_subitem) {
                            return $item->id == $contactList_subitem->id;
                        });
                    }
                }
            }
        }

        return $contactList;
    }
    
    public function getParentCategory($slug)
    {
        $parentCategory = self::where('slug', $slug)->parent->first();
        return $parentCategory;
    }
    /**
     * Get a Contact by Slug
     */
    public function getContactBySlug($slug)
    {
        return Contact::where('slug', $slug)->first();
    }
}