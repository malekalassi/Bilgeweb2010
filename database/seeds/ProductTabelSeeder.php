<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTabelSeeder extends Seeder
{
    protected $products = [
        [
         'brand_id'     => 1,
          'sku'         => '09484',
          'name'        => '98Tv',
          'slug'        =>  'tv',
          'quantity'    => 9
        ],
        [
            'brand_id'     => 2,
            'sku'         => '09484',
            'name'        => '98Tv',
            'slug'        =>  'tv',
            'quantity'    => 9
        ],
        [
            'brand_id'     => 2,
            'sku'         => '09484',
            'name'        => '98Tv',
            'slug'        =>  'device',
            'quantity'    => 9
        ],
        [
            'brand_id'     => 1,
            'sku'         => '09484',
            'name'        => '98Tv',
            'slug'        =>  'mix',
            'quantity'    => 5
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
