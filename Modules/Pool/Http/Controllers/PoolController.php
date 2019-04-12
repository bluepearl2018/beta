<?php

namespace Modules\Pool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Pool\Entities\Pool;
use \App\User;
use Route;
use Session;

use \Modules\Pool\Repositories\PoolRepository as PoolRepository;
use \Modules\Pool\Repositories\PoolLinguistRepository as PoolLinguistRepository;
use \Modules\Pool\Repositories\PoolDtperRepository as PoolDtperRepository;
use \Modules\Pool\Repositories\PoolDeveloperRepository as PoolDeveloperRepository;
use \Modules\Pool\Repositories\PoolAcademicRepository as PoolAcademicRepository;
use \Modules\Pool\Repositories\PoolManagerRepository as PoolManagerRepository;

    
class PoolController extends Controller
{
    
    /** @var PoolRepository */
    protected $poolRepository;
    /** @var PoolManagerRepository */
    protected $poolManagerRepository;
    /** @var PoolLinguistRepository */
    protected $poolLinguistRepository;
    /** @var PoolDtperRepository */
    protected $poolDtperRepository;
    /** @var PoolAcademicRepository */
    protected $poolAcademicRepository;
    /** @var PoolDeveloperRepository */
    protected $poolDeveloperRepository;

    public function __construct(
        PoolRepository $poolRepo,
        PoolLinguistRepository $poolLinguistRepo,
        PoolDtperRepository $poolDtperRepo,
        PoolAcademicRepository $poolAcademicRepo,
        PoolManagerRepository $poolManagerRepo,
        PoolDeveloperRepository $poolDeveloperRepo
    )
    {
      $this->poolRepository = $poolRepo;
      $this->poolLinguistRepository = $poolLinguistRepo;
      $this->poolDtperRepository = $poolDtperRepo;
      $this->poolAcademicRepository = $poolAcademicRepo;
      $this->poolManagerRepository = $poolManagerRepo;
      $this->poolDeveloperRepository = $poolDeveloperRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('pool::index');
    }

    /***
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(?User $user)
    {
        return view('pool::create');
    }

    /***
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    
    public function store(Request $request)
    {
        $input = $request->all();
        Pool::create($input, ['slug' => 'corriger']);
    }

    public function showPoolsByDomain($slug)
    {
        $domain = $this->poolRepository->getMainPool($slug);
        $childrenpools = $this->poolRepository->getChidrenPoolsByCode($slug);
        return view('pool::domain.domainPools')->with(compact('domain', 'childrenpools'));
    }
    
    public function showPool($category, $slug)
    {
        $poolData = $this->poolRepository->showPool($slug);
        $translatorsForCurrentPool = $this->poolLinguistRepository->getLinguistsForSelectedPool($slug);
        $developersForCurrentPool = $this->poolDeveloperRepository->getDevelopersForSelectedPool($slug);
        $academicsForCurrentPool = $this->poolAcademicRepository->getAcademicsForSelectedPool($slug);
        $dtpersForCurrentPool = $this->poolDtperRepository->getDtpersForSelectedPool($slug);
        $managersForCurrentPool = $this->poolManagerRepository->getManagersForSelectedPool($slug);
        $countLocales = count(\Illuminate\Support\Facades\Config::get('app.serviceLocales'));
        
        /***
         * Generate a unique Languages list for available PoolManagers
         */
        $selectPoolManagerLanguages = [];
        if(!is_null($managersForCurrentPool)){
            $selectPoolManagerRegions = [];
            foreach($managersForCurrentPool as $regions){
                $selectPoolManagerRegions[] = $regions->language;
            }
            $selectPoolManagerLanguages = array_unique($selectPoolManagerRegions);
        }
        
        /***
         * Generate a unique Languages list for available PoolAcademics
         */
        $selectPoolAcademicLanguages = [];
        if(!is_null($academicsForCurrentPool)){
            $selectPoolAcademicRegions = [];
            foreach($academicsForCurrentPool as $regions){
                $selectPoolAcademicRegions[] = $regions->language;
            }
            $selectPoolAcademicLanguages = array_unique($selectPoolAcademicRegions);
        }

        /***
         * Generate a unique Languages list for PoolDevelopers
         */
        $selectPoolDeveloperLanguages = [];
        if(!is_null($developersForCurrentPool)){
            $selectPoolDeveloperRegions = [];
            foreach($developersForCurrentPool as $regions){
                $selectPoolDeveloperRegions[] = $regions->language;
            }
            $selectPoolDeveloperLanguages = array_unique($selectPoolDeveloperRegions);
        }

        $selectPoolTranslatorsTgtLanguages = [];
        $selectPoolTranslatorsSrcLanguages = [];
        /***
         * Generate language Pairs selectors for available translators in pool
        if(!is_null($developersForCurrentPool)){
            foreach($translatorsForCurrentPool as $targetlanguages){
                $selectPoolTranslatorsTargets[] = $targetlanguages->targetlanguage;
            }
            $selectPoolTranslatorsTgtLanguages = array_unique($selectPoolTranslatorsTargets);
            
            foreach($translatorsForCurrentPool as $sourcelanguages){
                $selectPoolTranslatorsSources[] = $sourcelanguages->sourcelanguage;
            }
            $selectPoolTranslatorsSrcLanguages = array_unique($selectPoolTranslatorsSources);
        }
         */
        
        return view('pool::show')->with(compact('poolData', 'countLocales', 
        'translatorsForCurrentPool','dtpersForCurrentPool', 'academicsForCurrentPool', 
        'developersForCurrentPool', 'managersForCurrentPool', 
        'selectPoolManagerLanguages', 'selectPoolDeveloperLanguages', 
        'selectPoolTranslatorsTgtLanguages', 'selectPoolAcademicLanguages', 
        'selectPoolTranslatorsSrcLanguages'));
    }

    public function applyToManageAPool(Request $request)
    {
        return redirect('/contact/contact-eutranet');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('pool::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    
    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxPoolSelector($domain)
    {
        return $this->poolRepository->getChidrenPoolsByCodeAsJson($domain);
    }
}
