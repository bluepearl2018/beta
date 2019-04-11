<?php

namespace Modules\Pool\Http\ViewComposers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Route;
use URL;
use \Modules\Pool\Repositories\PoolRepository as PoolRepository;
use \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class PoolBreadcrumbsComposer
{
    
    /** @var PoolRepository */
    private $poolRepository;

    public function __construct(
        PoolRepository $poolRepo
    )
    {
      $this->poolRepository = $poolRepo;
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
        $pool = $this->poolRepository->showPool($uri_tail);
        $bcSlugs = array_slice($uri_parts, 3);
        $view->with(compact('bcSlugs', 'pool'));

    }
    
}