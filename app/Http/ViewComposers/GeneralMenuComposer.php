<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;


class GeneralMenuComposer
{
    public function makeGeneralMenu()
    {
        return Menu::new([
            Link::to('/', 'Home'),
            Link::to('/what', 'What'),
            Link::to('/pools', 'Pools'),
            Link::to('/doc', 'Doc'),
            Link::to('/subscription', 'Subscriptions'),
            Link::to('/blog', 'News'),
            Link::to('/workspace', 'Workspace'),
        ])
        ->addClass('navbar nav navbar-light border-bottom')
        ->submenu(
            Link::to('#', 'Dropdown <span class="caret"></span>')
                ->addClass('dropdown-toggle')
                ->setAttributes(['data-toggle' => 'dropdown', 'role' => 'button']),
            Menu::new()
                ->addClass('dropdown-menu')
                ->link('#', 'Action')
                ->link('#', 'Another action')
                ->html('', ['role' => 'separator', 'class' => 'divider'])
        )
        // ->wrap('div class="collapse navbar-collapse"')
        ->setActive('/one');
    }
    public function compose(View $view)
    {
        $view->with('menu', $this->makeGeneralMenu());
    }
}