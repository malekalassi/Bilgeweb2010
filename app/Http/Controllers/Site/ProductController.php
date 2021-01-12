<?php

namespace App\Http\Controllers\Site;

use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;

use App\Traits\FlashMessages;
use Illuminate\Http\Request;
use App\Contracts\AttributeContract;

class ProductController extends BaseController
{
    use FlashMessages;
    /**
     * @var ProductContract
     */
    private $productRepository;
    /**
     * @var AttributeContract
     */
    private $attributeRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();
//        dd($product->attributes);

        return view('site.pages.product', compact('product', 'attributes'));
    }
    public function addToCart(Request $request)
    {

        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');
//        dd(\Cart::content() );

        \Cart::add(uniqid(), $product->name, $request->input('qty'), $request->input('price'), $options);
//        \Cart::add($product->id,$price, $options);

        return $this->responseRedirectBack( 'Item added to cart successfully.' ,'success',false, false);


    }
}
