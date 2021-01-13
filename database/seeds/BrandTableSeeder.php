<?php

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
   protected $brands = [
        [
            'name' => 'v8' ,
            'slug' => 'v8'
        ] ,
        [
           'name'  => 'sport',
            'slug' => 'sport'
        ]
        ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->brands as $brand){
            Brand::create($brand);

        }

    }
}
