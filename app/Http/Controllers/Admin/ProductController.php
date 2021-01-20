<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeProductFromRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     * @var ProductContract
     */
    private $productRepository;
    /**
     * @var CategoryContract
     */
    private $categoryRepository;
    /**
     * @var BrandContract
     */
    private $brandRepository;

    public function __construct(ProductContract $productRepository ,CategoryContract $categoryRepository ,BrandContract $brandRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $products =$this->productRepository->listProducts();


        $this->setPageTitle('Products' , 'Create Products');

        return view('admin.products.index' , compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Create Product');
        return view('admin.products.create' ,compact('brands' , 'categories'));
    }

    public function store(StoreProductFromRequest $request)
    {
//            dd($request);
        $params =$request->except('_token');
        $product  = $this->productRepository->createProduct($params);

        if (!$product){
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return  $this->responseRedirect('admin.products.index' , 'Product added successfully' ,'success' ,false , false);
    }

    public function edit($id)
    {
//        dd($id);
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'brands', 'product'));

    }

}
