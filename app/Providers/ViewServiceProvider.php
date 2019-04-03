<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'partials.general-menu', 'App\Http\ViewComposers\GeneralMenuComposer'
        );

        // Using class based composers...
        View::composer(
            'partials.breadcrumbs', 'App\Http\ViewComposers\BreadcrumbsComposer'
        );
    }

}