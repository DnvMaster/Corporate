<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\MenusRepository;
use Corp\Repositories\SlidersRepository;

class IndexController extends SiteController
{
    public function __construct(SlidersRepository $sliders_repository)
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu()));
        $this->bar = 'right';
        $this->sliders_repository = $sliders_repository;
        $this->template = env('CORP').'.index';
    }
    
    public function index()
    {
        $sliderItems = $this->getSliders();
        $sliders = view(env('CORP').'.sliders')->with('sliders',$sliderItems)->render();
        $this->vars = array_add($this->vars,'sliders', $sliders);

        return $this->renderOutput();
    }

    protected function getSliders()
    {
        $sliders = $this->sliders_repository->get();
        if($sliders->isEmpty()) {
            return false;
        }
        $sliders->transform(function($item,$key) 
        {
            $item->img = \Config::get('settings.slider_path').'/'.$item->img;
            return $item;
        });
        return $sliders;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
