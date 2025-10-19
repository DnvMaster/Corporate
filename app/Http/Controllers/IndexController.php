<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\MenusRepository;
use Corp\Repositories\SlidersRepository;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\ArticlesRepository;
use Config;

class IndexController extends SiteController
{
    public function __construct(SlidersRepository $sliders_repository, PortfoliosRepository $portfolios_repository, ArticlesRepository $articles_repository)
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu()));
        $this->bar = 'right';
        $this->sliders_repository = $sliders_repository;
        $this->portfolios_repository = $portfolios_repository;
        $this->articles_repository = $articles_repository;
        $this->template = env('CORP').'.index';
    }
    
    public function index()
    {
        $this->title = 'DnvMaster - Главная';
        $this->keywords = 'DnvMaster, Laravel, MySQL, Bootstrap, Template';
        $this->description = 'DnvMaster - Это создание первоклассных проектов на фреймворке Laravel, MySQL, Bootstrap';

        $sliderItems = $this->getSliders();
        $sliders = view(env('CORP').'.sliders')->with('sliders',$sliderItems)->render();
        $this->vars = array_add($this->vars,'sliders', $sliders);

        $portfolios = $this->getPortfolio();
        $content = view(env('CORP').'.content')->with('portfolios',$portfolios)->render();
        $this->vars = array_add($this->vars,'content',$content);

        $articles = $this->getArticles();
        $this->contentRightBar = view(env('CORP').'.sidebar')->with('articles',$articles)->render();

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
            $item->img = Config::get('settings.slider_path').'/'.$item->img;
            return $item;
        });
        return $sliders;
    }

    protected function getPortfolio()
    {
        $portfolio = $this->portfolios_repository->get('*', Config::get('settings.home_port_count'));
        return $portfolio;
    }

    protected function getArticles()
    {
        $articles = $this->articles_repository->get(['title','created_at','img','alias'], Config::get('settings.home_articles_count'));
        return $articles;
    }
}
