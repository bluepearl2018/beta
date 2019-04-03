<?php

namespace Modules\Blog\Http\ViewComposers;
use Illuminate\View\View;
use \Modules\Blog\Repositories\BlogRepository as BlogRepository;

class BlogListComposer
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
        $view->with('blogList', $this->blogRepository::getArticleList());
    }
}