<?php
namespace Modules\Profile\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ProfileViewServiceProvider extends ServiceProvider
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
            [
            'profile::index', 
            'profile::userProfile.userProfile', 
            'profile::userProfile.userProfileNavLinks'], 
            \Modules\Profile\Http\ViewComposers\PrivateProfileComposer::class
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        
    }
}