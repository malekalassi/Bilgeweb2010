<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTabelSeeder extends Seeder
{
    protected $products = [
        [
         'brand_id'     => 1,
          'sku'         => '09484',
          'name'        => 'mobile',
          'slug'        =>  'tv',
           'price'      => 9 ,
          'quantity'    => 9
        ],
        [
            'brand_id'     => 2,
            'sku'         => '09484',
            'name'        => 'mouse',
            'slug'        =>  'tv',
            'price'      => 19 ,
            'quantity'    => 9
        ],
        [
            'brand_id'     => 2,
            'sku'         => '09484',
            'name'        => '98Tv',
            'slug'        =>  'device',
            'price'      => 18 ,
            'quantity'    => 9
        ],
        [
            'brand_id'     => 1,
            'sku'         => '09484',
            'name'        => 'bara',
            'slug'        =>  'lara',
            'quantity'    => 5
        ],
        [
            'brand_id'     => 1,
            'sku'         => '09484',
            'name'        => '98Tv',
            'slug'        =>  'bara',
            'price'      => 50 ,
            'quantity'    => 5
        ],
        [
            'brand_id'     => 1,
            'sku'         => '09484',
            'name'        => 'ara',
            'slug'        =>  'mix',
            'price'      => 69 ,
            'quantity'    => 4
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->products as $product){
            Product::create($product);
        }

    }
}
