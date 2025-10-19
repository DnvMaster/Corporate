<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\ArticlesRepository;

class ArticlesController extends SiteController
{
    public function __construct(PortfoliosRepository $portfolios_repository, ArticlesRepository $articles_repository)
    {
    	parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu()));
    	$this->bar = 'right';
        $this->portfolios_repository = $portfolios_repository;
        $this->articles_repository = $articles_repository;
        $this->template = env('CORP').'.articles';
    }

    public function index()
    {
    	$articles = $this->getArticles();
    	$content = view(env('CORP').'.articles_content')->with('articles',$articles)->render();
    	$this->vars = array_add($this->vars,'content',$content);

    	return $this->renderOutput();
    }

    public function getArticles($alias = false)
    {
    	$articles = $this->articles_repository->get(['id','title','alias','created_at','img','description','user_id','category_id'],false,true);
    	if ($articles) {
    		# $articles->load('user','category','comments');
    	}
    	return $articles;
    }
}
