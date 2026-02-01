<?php

namespace App\Http\Controllers;

use App\Repositories\PortfoliosRepository;
use App\Repositories\SlidersRepository;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class IndexController extends CorporateController
{
    public function __construct(SlidersRepository $sliders_repository, PortfoliosRepository $portfolios_repository,ArticlesRepository $articles_repository)
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu()));
        $this->bar = 'right';
        $this->sliders_repository = $sliders_repository;
        $this->portfolios_repository = $portfolios_repository;
        $this->articles_repository = $articles_repository;
        $this->template = 'corporate.index';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getSliders = $this->getSliders();
        $sliders = view('corporate.sliders',compact('getSliders'))->render();
        $this->vars = Arr::add($this->vars,'sliders',$sliders);

        $articles = $this->getArticles();
        $this->contentRightBar = view('corporate.indexBar',compact('articles'))->render();

        $getPortfolios = $this->getPortfolios();
        $content = view('corporate.content',compact('getPortfolios'))->render();
        $this->vars = Arr::add($this->vars,'content',$content);

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

    protected function getPortfolios()
    {
        $portfolio = $this->portfolios_repository->getAll(['id','title','text','images','filter_alias'],Config::get('settings.portfolio_count'));
        return $portfolio;
    }

    protected function getArticles()
    {
        $article =$this->articles_repository->getAll(['id','title','created_at','images'],Config::get('settings.articles_count'));
        return $article;
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
