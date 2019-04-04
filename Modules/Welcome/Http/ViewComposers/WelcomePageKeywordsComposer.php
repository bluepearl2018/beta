<?php

namespace Modules\Welcome\Http\ViewComposers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Route;
use URL;
use \Modules\Pages\Repositories\PageRepository as PageRepository;
use \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class WelcomePageKeywordsComposer
{
    
    /** @var PageRepository */
    private $pageRepository;

    public function __construct(
        PageRepository $pageRepo
    )
    {
      $this->pageRepository = $pageRepo;
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
        $currentPage = $this->pageRepository->showWelcomePage($uri_tail);
        $view->with(compact('currentPage'));
    }
    
}