<?php


namespace App\Repositories;


use App\Contracts\CategoryContract;
use App\Models\Category;

class CategoryRepository extends  BaseRepository implements CategoryContract
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findCategoryById(int $id)
    {
        // TODO: Implement findCategoryById() method.
    }

    public function createCategory(array $params)
    {
        // TODO: Implement createCategory() method.
    }

    public function updateCategory(array $params)
    {
        // TODO: Implement updateCategory() method.
    }

    public function deleteCategory($id)
    {
        // TODO: Implement deleteCategory() method.
    }

    public function treeList()
    {
        return Category::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->listsFlattened('name');
    }

    public function findBySlug($slug)
    {
       return Category::with('products')
            ->where('slug', $slug)
            ->where('menu', 1)
            ->first();
    }
}
