<?php

use Illuminate\Database\Seeder;

class ProductAttributesTableSeeder extends Seeder
{
    protected $productAttributes = [
        [
            'quantity' =>3 ,
            'price'    => 89 ,
            'product_id' => 1
        ] ,
        [
            'quantity' =>2 ,
            'price'    => 50 ,
            'product_id' => 2
        ] ,
        [
            'quantity' =>2 ,
            'price'    => 40 ,
            'product_id' => 3
        ] ,
        [
            'quantity' =>1 ,
            'price'    => 20 ,
            'product_id' => 4
        ] ,



    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->productAttributes as $productAttribute){
            \App\Models\ProductAttribute::create($productAttribute);
        }
        \Illuminate\Support\Facades\DB::table('attribute_value_product_attribute')->insert([
                [
                    'attribute_value_id' => 1,
                    'product_attribute_id' => 1
                ],
                [
                    'attribute_value_id' => 2,
                    'product_attribute_id' => 2
                ]
            ]
        );
    }
}
