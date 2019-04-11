<?php

namespace Modules\Pool\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class PoolEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        PoolPostWasPublished::class => [
            NotifyUsersOfNewPool::class,
        ],
        PoolPostWasUpdated::class => [
            NotifyAdminsOfNewPool::class,
        ],
        PoolPostWasUpdated::class => [
            NotifyAdminsOfNewPool::class,
        ],
        PoolPostWasCreated::class => [
            NotifyAdminsOfNewPool::class,
        ],
    ];
}