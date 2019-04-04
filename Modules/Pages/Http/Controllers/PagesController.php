<?php

namespace Modules\Pages\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Pages\Entities\Page;
use \App\User;
use Route;

use \Modules\Pages\Repositories\PageRepository as PageRepository;

    
class PagesController extends Controller
{
    
    /** @var PageRepository */
    protected $pageRepository;

    public function __construct(
        PageRepository $pageRepo
    )
    {
      $this->pageRepository = $pageRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('pages::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pages::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the specified page.
     * @param string $slug
     * @return Response
     */

    
    public function showPage($category, $slug = null)
    {
        if(!empty($slug))
        {
            $pageData = $this->pageRepository->showPageCategory($slug);
            if($pageData){
                return view('pages::show', ['pageData' => $pageData]);    
            }
            abort('404');
        }
        return $this->showPageCategory($category);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function showPageCategory($pageCategory)
    {
        $categoryData = $this->pageRepository->showPageCategory($pageCategory);
        if($categoryData){
            $pageCategories = $categoryData->children;
            return view('pages::partials.pageList')->with(compact('categoryData', 'pageCategories'));
        }
        abort('404');
    }


     /**
     * Show the specified category.
     * @param string $category
     * @return Response
     */

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('pages::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('pages::edit');
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
}
