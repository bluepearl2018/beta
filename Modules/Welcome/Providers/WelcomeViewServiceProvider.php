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
        View::composer(
            ['welcome::index'], \Modules\Blog\Http\ViewComposers\BlogLatestNewsBoxComposer::class
        );
        
        View::composer(
            'welcome::partials.welcomeMenu', 'Modules\Welcome\Views\Composers\WelcomeMenuComposer'
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
