<?php

namespace Modules\Pool\Http\ViewComposers;
use Illuminate\View\View;
use Modules\Pool\Repositories\PoolRepository as PoolRepository;

class PoolListComposer
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
        $view->with('poolList', $this->poolRepository->getPoolCategories());
    }
}