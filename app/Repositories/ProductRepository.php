<?php


namespace App\Repositories;


use App\Contracts\ProductContract;
use App\Models\Product;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ProductRepository extends BaseRepository implements ProductContract
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function findProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return $product;
    }

    public function findProductById( int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns , $order , $sort);
    }

    public function createProduct(array $params)
    {
        try {
            $collection = collect($params);
            $featured =$collection->has('featured') ? 1 : 0 ;
            $status = $collection->has('status') ? 1: 0 ;
            $merge = $collection->merge(compact('featured' , 'status'));

            $product = new Product($merge->all());

            $product->save();

            if ($collection->has('categories')){
                $product->categories()->sync($params['categories']);
            }

            return $product ;

        }
        catch (QueryException $exception){
            throw new InvalidArgumentException();
        }
    }
}
