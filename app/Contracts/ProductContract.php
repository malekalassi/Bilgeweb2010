<?php


namespace App\Contracts;




interface ProductContract
{
    public function findProductBySlug($slug);

    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function createProduct(array $params);

}
