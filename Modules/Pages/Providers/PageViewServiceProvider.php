<?php
namespace Modules\Pages\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PageViewServiceProvider extends ServiceProvider
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
            'pages::partials.pageMenu', \Modules\Pages\Http\ViewComposers\PageMenuComposer::class
        );

        View::composer(
            'pages::index', \Modules\Pages\Http\ViewComposers\PageListComposer::class
        );

        View::composer(
            ['pages::partials.pageBreadcrumbs'], \Modules\Pages\Http\ViewComposers\PageBreadcrumbsComposer::class
        );

        View::composer(
            ['pages::partials.pageTitle'], \Modules\Pages\Http\ViewComposers\PageTitleComposer::class
        );
        
        View::composer(
            ['pages::partials.pageDescription'], \Modules\Pages\Http\ViewComposers\PageDescriptionComposer::class
        );
        
        View::composer(
            ['pages::partials.pageKeywords'], \Modules\Pages\Http\ViewComposers\PageKeywordsComposer::class
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