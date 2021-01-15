<?php


namespace App\Contracts;


interface SlideContract
{
    public function listSlides();
    /**
     * @param array $params
     * @return mixed
     */
    public function createSlide(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSlide(array $params);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteSlide($id);

}
