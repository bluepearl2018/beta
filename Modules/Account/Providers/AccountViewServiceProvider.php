<?php
namespace Modules\Account\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AccountViewServiceProvider extends ServiceProvider
{
    
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Using class based composers...
        View::composer(
            ['account::partials.accountInfo'], \Modules\Account\Http\ViewComposers\UserAccountComposer::class
        );
    }
}