<?php

namespace Modules\Blog\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class BlogEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        /**
         * Published => notify users
         */ 
        BlogArticleWasPublished::class => [
            NotifyUsersOfNewArticle::class,
        ],
        
        /**
         * Draf => notify admins
         */ 

        BlogArticleWasCreated::class => [
            NotifyAdminsOfNewArticle::class,
        ],
        BlogArticleWasUpdated::class => [
            NotifyAdminsOfUpdatedArticle::class,
        ],
        BlogArticleWasDeledated::class => [
            NotifyAdminsOfDeletedArticle::class,
        ],
    ];
}