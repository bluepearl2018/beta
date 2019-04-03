<?php

namespace Modules\Blog\Http\ViewComposers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Route;
use URL;
use \Modules\Blog\Repositories\BlogRepository as BlogRepository;
use \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class BlogPageKeywordsComposer
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
        $uri_path = URL::current();
        $uri_parts = explode('/', $uri_path);
        $uri_tail = end($uri_parts);
        $currentArticle = $this->blogRepository->showArticle($uri_tail);
        $view->with(compact('currentArticle'));
    }
    
}