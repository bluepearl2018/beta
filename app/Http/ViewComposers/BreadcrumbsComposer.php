<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Route;

class BreadcrumbsComposer
{
    public function compose(View $view)
    {
        $view->with('breadcrumbs', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::generate(Route::currentRouteName()));
    }
}