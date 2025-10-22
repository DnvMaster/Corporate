<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\CommentsRepository;

class ArticlesController extends SiteController
{
    public function __construct(PortfoliosRepository $portfolios_repository, ArticlesRepository $articles_repository, CommentsRepository $comments_repository)
    {
    	parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu()));
    	$this->bar = 'right';
        $this->portfolios_repository = $portfolios_repository;
        $this->articles_repository = $articles_repository;
        $this->comments_repository = $comments_repository;
        $this->template = env('CORP').'.articles';
    }

    public function index()
    {
    	$articles = $this->getArticles();
    	$content = view(env('CORP').'.articles_content')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'content',$content);
        
        $comments = $this->getComments(config('settings.recent_comments'));
        $portfolios = $this->getPortfolios(config('settings.recent_portfolios'));
        $this->contentRightBar = view(env('CORP').'.articlesBar')->with(['comments' => $comments, 'portfolios' => $portfolios])->render();

    	return $this->renderOutput();
    }

    public function getArticles($alias = false)
    {
    	$articles = $this->articles_repository->get(['id','title','alias','created_at','img','text','description','user_id','category_id'],false,true);
    	if ($articles) {
    		// b$articles->load('user','category','comments');
    	}
    	return $articles;
    }

    public function getComments($take)
    {
        $comments = $this->comments_repository->get(['text','name','email','site','article_id','user_id'],$take);
        return $comments;
    }

    public function getPortfolios($take)
    {
        $portfolios = $this->portfolios_repository->get(['title','text','alias','customer','img','filter_alias'],$take);
        return $portfolios;
    }
}
