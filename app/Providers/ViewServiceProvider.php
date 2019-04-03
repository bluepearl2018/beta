<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
            ['partials.general-menu', 'partials.nav-sidenav'], 'App\Http\ViewComposers\GeneralMenuComposer'
        );

        // Using class based composers...
        View::composer(
            'partials.breadcrumbs', 'App\Http\ViewComposers\BreadcrumbsComposer'
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