<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use App\Repositories\PortfoliosRepository;
use App\Repositories\SlidersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Config;

class IndexController extends CorporateController
{
    public function __construct(SlidersRepository $sliders_repository, PortfoliosRepository $portfolios_repository, ArticlesRepository $articles_repository)
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu()));
        $this->sliders_repository = $sliders_repository;
        $this->portfolios_repository = $portfolios_repository;
        $this->articles_repository = $articles_repository;
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
        $portfolios = $this->getPortfolio();
        $content = view(env('MASTER').'.content')->with('portfolios',$portfolios)->render();
        $this->vars = Arr::add($this->vars,'content',$content);

        $dataSlider = $this->getSliders();
        $sliders = view(env('MASTER').'.sliders')->with('sliders',$dataSlider)->render();
        $this->vars = Arr::add($this->vars,'sliders',$sliders);

        $this->title = 'Pink Rio | A strong, powerful and multiporpose WordPress Theme';
        $this->keywords = 'Pink Rio Template';
        $this->description = 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat.';

        $articles = $this->getArticles();
        $this->contentRightBar = view(env('MASTER').'.indexBar')->with('articles',$articles)->render();

        return $this->templateOutput();
    }

    protected function getPortfolio()
    {
        $portfolios = $this->portfolios_repository->get('*',Config::get('settings.number_port_count'));
        return $portfolios;
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
            $item->img = Config::get('settings.slider_path').'/'.$item->img;
            return $item;
        });
        return $sliders;
    }

    public function getArticles()
    {
        $articles = $this->articles_repository->get(['title','created_at','img','alias'], Config::get('settings.rightBar'));
        return $articles;
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
