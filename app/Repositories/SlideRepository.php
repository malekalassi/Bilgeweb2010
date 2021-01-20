<?php


namespace App\Repositories;


use App\Contracts\SlideContract;
use App\models\Slide;
use App\Traits\UploadAble;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class SlideRepository extends BaseRepository implements SlideContract
{
    use UploadAble;
    public function __construct(Slide $model)
    {
        parent::__construct($model);
        $this->model  = $model ;
    }

    public function createSlide(array $params)
    {
        try {
            $image = null ;
            $collection = collect($params);
            if ($collection->has('image') && $params['image'] instanceof UploadedFile){
                $image = $this->uploadOne($params['image'] , 'slides');
            }
            $merge = $collection->merge(compact('image'));

//            dd($merge);

            $slide = new Slide($merge->all());

            $slide->save();

            return $slide;

        }
        catch (QueryException $queryException){
            throw new InvalidArgumentException($queryException->getMessage());
        }

    }

    public function updateSlide(array $params)
    {
        // TODO: Implement updateSlide() method.
    }

    public function deleteSlide($id)
    {
        $slide = $this->findOneOrFail($id);

        if ($slide->image != null) {
            $this->deleteOne($slide->image);
        }
        return $slide = $this->delete($id);
    }

    public function listSlides(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all();
    }

    public function findSlideById($id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }
}
