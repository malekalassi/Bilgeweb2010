<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryTableSeeder extends Seeder
{
    protected $productCategoryItems = [
        [
            'category_id' => 1,
            'product_id' =>1
        ],
        [
            'category_id' => 9,
            'product_id' =>2
        ],
        [
            'category_id' => 9,
            'product_id' =>3
        ],
        [
            'category_id' => 9,
            'product_id' =>4
        ],
        [
            'category_id' => 3,
            'product_id' =>4
        ],
        [
            'category_id' => 8,
            'product_id' =>4
        ]

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->productCategoryItems as $productCategoryItem){
            DB::table('product_categories')->insert($productCategoryItem);
        }
    }
}
