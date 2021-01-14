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

    public function edit($id)
    {
        $targetCategory = $this->categoryRepository->findCategoryById($id);
        $categories = $this->categoryRepository->treeList();
//        return $categories;


        $this->setPageTitle('Categories', 'Edit Category : '.$targetCategory->name);
        return view('admin.categories.edit', compact('categories', 'targetCategory'));
    }

    public function update(Request $request)
    {
        //make validate
        $this->validate($request ,[
            'name' =>'required|max:191',
            'parent_id' => 'required|not_in:0' ,
            'image'=>'mimes:jpg,jpeg,png|max:1000'
        ]);
        $params = $request->except('_token');

        $category = $this->categoryRepository->updateCategory($params);
        if (!$category){
            return $this->responseRedirect('Error occurred while updating category.' ,'error' ,true,true);
        }
        return  $this->responseRedirectBack('Category updated successfully' ,'success' ,false ,false);
    }
}
