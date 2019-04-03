<?php

namespace Modules\Welcome\Views\Composers;

use \Illuminate\View\View;
use \Spatie\Menu\Laravel\Link;
use \Spatie\Menu\Laravel\Menu;


class WelcomeMenuComposer
{
    public function makeWelcomeMenu()
    {
        return Menu::new([
            Link::to('/', 'Home')
                ->addClass('py-1 nav-item text-dark'),
            Link::to('/what', 'What')
                ->addClass('py-1 nav-item text-dark'),
            Link::to('/pools', 'Pools')
                ->addClass('py-1 nav-item text-dark'),
            Link::to('/doc', 'Doc')
                ->addClass('py-1 nav-item text-dark'),
            Link::to('/subscription', 'Subscriptions')
                ->addClass('py-1 nav-item text-dark'),
            Link::to('/blog', 'News')
                ->addClass('py-1 nav-item text-dark'),
            Link::to('/workspace', 'Workspace')
                ->addClass('py-1 nav-item text-dark'),
        ])
        ->addClass('nav flex-column')
        ->addClass('navbar-expand-md py-2 list-group')
        ->wrap('nav ul id="welcome-accordion"')
        ->setActive('/one');
    }
    
    public function compose(View $view)
    {
        return $view->with('welcomeMenu', $this->makeWelcomeMenu());
    }
}