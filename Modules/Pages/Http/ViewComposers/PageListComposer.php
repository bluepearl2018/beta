<?php

namespace Modules\Pages\Http\ViewComposers;
use Illuminate\View\View;
use \Modules\Pages\Repositories\PageRepository as PageRepository;

class PageListComposer
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
        $view->with('pageList', $this->pageRepository::getPageList());
    }
}