<?php

namespace Http\ViewComposers;

use Illuminate\View\View;

class WelcomePageComposer{

    public function compose(View $view)
    {
        // $view->with('pools', $this->makeGeneralMenu());
    }

}