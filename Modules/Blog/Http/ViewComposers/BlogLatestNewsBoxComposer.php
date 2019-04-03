<?php

namespace Modules\Blog\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Route;
use URL;
use \Modules\Blog\Repositories\BlogRepository as BlogRepository;

class BlogLatestNewsBoxComposer
{
    
    /** @var BlogRepository */
    private $blogRepository;

    public function __construct(
        BlogRepository $blogRepo
    )
    {
      $this->blogRepository = $blogRepo;
    }
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('blogLatestArticle', $this->blogRepository->getLatestArticle());
    }
}