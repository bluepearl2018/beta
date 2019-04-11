<?php

namespace Modules\Pool\Http\ViewComposers;
use Illuminate\View\View;
use \Modules\Pool\Repositories\PoolRepository as PoolRepository;

class PoolStatisticsComposer
{
    
    /** @var PoolRepository */
    private $poolRepository;

    public function __construct(
        PoolRepository $poolRepo
    )
    {
      $this->poolRepository = $poolRepo;
    }
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('countPoolCategories', count($this->poolRepository->getPoolCategories()));
        $view->with('countPools', count($this->poolRepository->getPoolCategories()));
    }
}