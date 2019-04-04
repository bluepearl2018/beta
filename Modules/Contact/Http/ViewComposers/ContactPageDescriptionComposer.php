<?php

namespace Modules\Contact\Http\ViewComposers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Route;
use URL;
use \Modules\Contact\Repositories\ContactRepository as ContactRepository;
use \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class ContactPageDescriptionComposer
{
    
    /** @var ContactRepository */
    private $contactRepository;

    public function __construct(
        ContactRepository $contactRepo
    )
    {
      $this->contactRepository = $contactRepo;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $uri_path = URL::current();
        $uri_parts = explode('/', $uri_path);
        $uri_tail = end($uri_parts);
        $currentContact = $this->contactRepository->showContact($uri_tail);
        $bcSlugs = array_slice($uri_parts, 3);
        // dd($bcSlugs);
        $view->with(compact('bcSlugs', 'currentContact'));
    }
    
}