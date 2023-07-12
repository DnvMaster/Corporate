<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ArticlesController extends CorporateController
{
    public function __construct(PortfoliosRepository $portfolios_repository, ArticlesRepository $articles_repository)
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu()));
        $this->portfolios_repository = $portfolios_repository;
        $this->articles_repository = $articles_repository;
        $this->bar = 'right';
        $this->template = env('MASTER').'.articles';
    }
    public function index()
    {
        $articles = $this->getArticles();
        $content = view('corporate.articles_content')->with('articles',$articles)->render();
        $this->vars = Arr::add($this->vars,'content',$content);

        return $this->templateOutput();
    }
    public function getArticles($alias = false)
    {
        $articles = $this->articles_repository->get(['title','alias','created_at','img','desc'],false,true);
        if ($articles)
        {
           // $articles->load('user','category','comments');
        }
        return $articles;
    }
}
