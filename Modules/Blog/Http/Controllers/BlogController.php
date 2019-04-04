<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Blog;
use \App\User;
use Route;

use \Modules\Blog\Repositories\BlogRepository as BlogRepository;

    
class BlogController extends Controller
{
    
    /** @var BlogRepository */
    protected $blogRepository;

    public function __construct(
        BlogRepository $blogRepo
    )
    {
      $this->blogRepository = $blogRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('blog::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(?User $user)
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Blog::create($input, ['slug' => 'corriger']);
    }
    
    public function showArticle($category, $slug = null)
    {
        if(!empty($slug))
        {
            $articleData = $this->blogRepository->showArticleCategory($slug);
            if($articleData){
                return view('blog::show', ['articleData' => $articleData]);    
            }
            abort('404');
        }
        return $this->showBlogCategory($category);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function showBlogCategory($blogCategory)
    {
        $categoryData = $this->blogRepository->showArticleCategory($blogCategory);
        if($categoryData){
            $blogCategories = $categoryData->children;
            return view('blog::partials.blogList')->with(compact('categoryData', 'blogCategories'));
        }
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('blog::edit');
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
