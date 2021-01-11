<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $categories = $this->categoryRepository->listCategories();

        $this->setPageTitle('Categories', 'List of all categories');
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->treeList();
        return view('admin.categories.create' ,compact('categories'));
    }

    public function edit()
    {
        $categories = $this->categoryRepository->treeList();
    }
}
