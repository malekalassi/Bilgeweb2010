<?php


namespace App\Repositories;


use App\Contracts\AttributeContract;
use App\Models\Attribute;

class AttributeRepository extends  BaseRepository implements AttributeContract
{
    public function __construct(Attribute $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listAttributes(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findAttributeById(int $id)
    {
        // TODO: Implement findAttributeById() method.
    }

    public function createAttribute(array $params)
    {
        // TODO: Implement createAttribute() method.
    }

    public function updateAttribute(array $params)
    {
        // TODO: Implement updateAttribute() method.
    }

    public function deleteAttribute($id)
    {
        // TODO: Implement deleteAttribute() method.
    }
}
