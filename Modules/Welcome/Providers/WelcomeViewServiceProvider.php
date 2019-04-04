<?php

namespace Modules\Welcome\Providers;

use \Illuminate\Support\Facades\View;
use \Modules\Blog\Http\ViewComposers\BlogLatestNewsBoxComposer;
use Illuminate\Support\ServiceProvider;

class WelcomeViewServiceProvider extends ServiceProvider
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
            'welcome::partials.welcomePageMenu', \Modules\Welcome\Http\ViewComposers\WelcomePageMenuComposer::class
        );

        View::composer(
            'welcome::index', \Modules\Welcome\Http\ViewComposers\WelcomePageListComposer::class
        );

        View::composer(
            ['welcome::partials.welcomePageBreadcrumbs'], \Modules\Welcome\Http\ViewComposers\WelcomePageBreadcrumbsComposer::class
        );

        View::composer(
            ['welcome::partials.welcomePageTitle'], \Modules\Welcome\Http\ViewComposers\WelcomePageTitleComposer::class
        );
        
        View::composer(
            ['welcome::partials.welcomePageDescription'], \Modules\Welcome\Http\ViewComposers\WelcomePageDescriptionComposer::class
        );
        
        View::composer(
            ['welcome::partials.welcomePageKeywords'], \Modules\Welcome\Http\ViewComposers\WelcomePageKeywordsComposer::class
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

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
