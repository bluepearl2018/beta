<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;
use DB;

class GeneralMenuComposer
{
    /**
     * Menu for quick nav by icon according available modules
     */

    protected static function getAvailableModules()
    {
        $modules = DB::table('modules')->get();
        return $modules;
    }

    public function compose(View $view)
    {
        $view->with('modules', $this->getAvailableModules());
    }
}