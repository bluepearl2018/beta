<?php

namespace Modules\Contact\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ContactViewServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        
        View::composer(
            ['contact::partials.contactBreadcrumbs'], \Modules\Contact\Http\ViewComposers\ContactBreadcrumbsComposer::class
        );

        View::composer(
            ['contact::partials.contactPageTitle'], \Modules\Contact\Http\ViewComposers\ContactPageTitleComposer::class
        );
        
        View::composer(
            ['contact::partials.contactPageDescription'], \Modules\Contact\Http\ViewComposers\ContactPageDescriptionComposer::class
        );
        
        View::composer(
            ['contact::partials.contactPageKeywords'], \Modules\Contact\Http\ViewComposers\ContactPageKeywordsComposer::class
        );

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
