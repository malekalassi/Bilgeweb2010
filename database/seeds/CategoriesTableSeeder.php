<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    protected $categories = [
        [
            'name'                       =>  'Electronics',
            'parent_id'                     =>  1,
        ],
        [
            'name'                       =>  'Computers',
            'parent_id'                     =>  1,
        ],
        [
            'name'                       =>  'Protectors',
            'parent_id'                     =>  1,
        ],
        [
            'name'                       =>  'Cables',
            'parent_id'                     =>  1,
        ],
        [
            'name'                       =>  'Smart Home',
            'parent_id'                     =>  1,
        ],
        [
            'name'                       =>  'Cameras',
            'parent_id'                     =>  1,
        ],
        [
            'name'                       =>  'Spotlight Camera',
            'parent_id'                     =>  6,
        ],
        [
            'name'                       =>  'Computer Accessories',
            'parent_id'                     =>  2,
        ],
        [
            'name'                       =>  'Data Storage',
            'parent_id'                     =>  2,
        ],
        [
            'name'                       =>  'Monitors',
            'parent_id'                     =>  2,
        ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        Category::create([
            'name'          =>  'Root',
            'description'   =>  'This is the root categories, don\'t delete this one',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);

        foreach ($this->categories  as $category)
        {
            Category::create([
                'name'          =>  $category['name'],
                'description'   =>  'This is the root categories, don\'t delete this one',
                'parent_id'     =>  $category['parent_id'],
                'menu'          =>  1,
            ]);
        }

    }
}
