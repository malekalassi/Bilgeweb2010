<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isInstanceOf;

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
        $this->setPageTitle('categories' , 'Create category');
        $categories = $this->categoryRepository->treeList();
        return view('admin.categories.create' ,compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request ,[
            'name' =>'required|max:191',
            'parent_id' => 'required|not_in:0' ,
            'image'=>'mimes:jpg,jpeg,png|max:1000'
        ]);
        $params = $request->except('token');
        $category = $this->categoryRepository->createCategory($params);

        if (!$category) {
          return  $this->responseRedirectBack('Error occurred while creating category.' ,'error' ,true ,true);
        }

        return  $this->responseRedirect('admin.categories.index' , 'Category added successfully' ,false ,false);



    }

    public function edit($id)
    {
        $targetCategory = $this->categoryRepository->s($id);
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

    public function delete($id)
    {

          $category =   $this->categoryRepository->deleteCategory($id);

          if (!$category){
              return $this->responseRedirectBack('Error occurred while deleting category.' ,'error' ,true ,true);
          }

          return $this->responseRedirect('admin.categories.index' ,'Category deleted successfully' ,'success' ,false ,false);

    }
}
