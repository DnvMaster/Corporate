<?php

namespace App\Http\Controllers;

use App\Repositories\SlidersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends CorporateController
{
    public function __construct(SlidersRepository $sliders_repository)
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu()));
        $this->sliders_repository = $sliders_repository;
        $this->bar = 'right';
        $this->template = env('MASTER').'.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSlider = $this->getSliders();
        $sliders = view(env('MASTER').'.sliders')->with('sliders',$dataSlider)->render();
        $this->vars = Arr::add($this->vars,'sliders',$sliders);

        return $this->templateOutput();
    }

    public function getSliders()
    {
        $sliders = $this->sliders_repository->get();
        if ($sliders->isEmpty())
        {
            return false;
        }
        $sliders->transform(function ($item, $key)
        {
            $item->img = \Config::get('settings.slider_path').'/'.$item->img;
            return $item;
        });
        return $sliders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
