<?php

namespace App\Http\Controllers;

use App\Repositories\SlidersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class IndexController extends CorporateController
{
    public function __construct(SlidersRepository $sliders_repository)
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu()));
        $this->bar = 'right';
        $this->sliders_repository = $sliders_repository;
        $this->template = 'corporate.index';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getSliders = $this->getSliders();
        $sliders = view('corporate.sliders', compact('getSliders'))->render();
        $this->vars = Arr::add($this->vars,'sliders',$sliders);
        return $this->Output();
    }

    protected function getSliders()
    {
        $slider = $this->sliders_repository->getAll();
        if ($slider->isEmpty()) { 
            return false; 
        } 
        $slider->transform(function ($item, $key) {
            $item['images'] = Config::get('settings.slider_path').'/'.$item['images']; 
            return $item; 
        });
        return $slider;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
