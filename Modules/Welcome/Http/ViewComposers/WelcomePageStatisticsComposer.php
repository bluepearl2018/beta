<?php

namespace Modules\Welcome\Http\ViewComposers;
use \Modules\Pages\Repositories\PageRepository as PageRepository;

use Illuminate\View\View;

class WelcomePageStatisticsComposer{

    public function compose(View $view)
    {
        // $view->with('pools', $this->makeGeneralMenu());
    }

}