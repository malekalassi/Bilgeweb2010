<?php

namespace App\Http\Controllers\Site;

use App\Contracts\CategoryContract;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryContract
     */
    private $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug)
    {

        $category = $this->categoryRepository->findBySlug($slug);
        
        return view('site.pages.category', compact('category'));

    }

}
