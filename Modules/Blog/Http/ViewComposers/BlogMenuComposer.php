<?php

namespace Modules\Blog\Http\ViewComposers;
use Illuminate\View\View;
use \Modules\Blog\Repositories\BlogRepository as BlogRepository;

class BlogMenuComposer
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
        // dd($this->blogRepository::getArticleCategories());
        $view->with('blogMenu', $this->blogRepository::getArticleCategories());
    }
}