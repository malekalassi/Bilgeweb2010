<?php


namespace App\Repositories;


use App\Contracts\CategoryContract;
use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;

class CategoryRepository extends  BaseRepository implements CategoryContract
{
    use UploadAble;

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
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createCategory(array $params)
    {
        // TODO: Implement createCategory() method.
    }

    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);
        $collection = collect($params);

        if ($collection->has('image') && $params['image'] instanceof UploadedFile){
            if ($category->image != null){
                $this->deleteOne($category->image);
            }
            $image = $this->uploadOne($params['image'] ,'categories');
        }
        $featured = $collection->has('featured') ? 1 : 0 ;
        $menu = $collection->has('menu') ? 1 : 0 ;

        $merge = $collection->merge(compact('menu', 'image', 'featured'));
//        dd($merge);
        $category->update($merge->all());
        return $category ;

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
