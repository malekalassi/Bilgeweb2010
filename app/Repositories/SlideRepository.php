<?php


namespace App\Repositories;


use App\Contracts\SlideContract;
use App\models\Slide;
use Illuminate\Database\Eloquent\Model;

class SlideRepository extends BaseRepository implements SlideContract
{
    public function __construct(Slide $model)
    {
        parent::__construct($model);
        $this->model  = $model ;
    }

    public function createSlide(array $params)
    {
        // TODO: Implement createSlide() method.
    }

    public function updateSlide(array $params)
    {
        // TODO: Implement updateSlide() method.
    }

    public function deleteSlide($id)
    {
        // TODO: Implement deleteSlide() method.
    }

    public function listSlides(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all();
    }
}
