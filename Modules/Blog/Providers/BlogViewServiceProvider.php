<?php
namespace Modules\Blog\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BlogViewServiceProvider extends ServiceProvider
{
    
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'blog::partials.blogMenu', \Modules\Blog\Http\ViewComposers\BlogMenuComposer::class
        );

        View::composer(
            'blog::index', \Modules\Blog\Http\ViewComposers\BlogListComposer::class
        );

        View::composer(
            ['blog::partials.blogBreadcrumbs'], \Modules\Blog\Http\ViewComposers\BlogBreadcrumbsComposer::class
        );

        View::composer(
            ['blog::partials.blogPageTitle'], \Modules\Blog\Http\ViewComposers\BlogPageTitleComposer::class
        );
        
        View::composer(
            ['blog::partials.blogPageDescription'], \Modules\Blog\Http\ViewComposers\BlogPageDescriptionComposer::class
        );
        
        View::composer(
            ['blog::partials.blogPageKeywords'], \Modules\Blog\Http\ViewComposers\BlogPageKeywordsComposer::class
        );

        View::composer(
            ['blog::index'], \Modules\Blog\Http\ViewComposers\BlogLatestNewsBoxComposer::class
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}