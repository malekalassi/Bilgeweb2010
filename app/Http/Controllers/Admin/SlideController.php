<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SlideContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlideController extends BaseController
{
    /**
     * @var SlideContract
     */
    private $slideRepository;

    public function __construct(SlideContract $slideRepository)
    {
        $this->slideRepository = $slideRepository;
    }

    public function index()
    {
        $slides = $this->slideRepository->listSlides();
        $this->setPageTitle('Slides' ,'Create slide');

        return view('admin.slides.index' ,compact('slides'));
    }
    public function create()
    {
        $this->setPageTitle('Slides' ,'Create slide');
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }

}
