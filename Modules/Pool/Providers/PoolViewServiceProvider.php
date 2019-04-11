<?php
namespace Modules\Pool\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PoolViewServiceProvider extends ServiceProvider
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
            'pool::partials.poolMenu', \Modules\Pool\Http\ViewComposers\PoolMenuComposer::class
        );

        View::composer(
            'pool::index', \Modules\Pool\Http\ViewComposers\PoolMenuComposer::class
        );

        View::composer(
            'pool::partials.poolBreadcrumbs', '\Modules\Pool\Http\ViewComposers\PoolBreadcrumbsComposer'
        );

        View::composer(
            'pool::partials.poolStatistics', '\Modules\Pool\Http\ViewComposers\PoolStatisticsComposer'
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