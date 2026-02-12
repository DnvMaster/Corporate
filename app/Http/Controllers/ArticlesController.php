<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use App\Repositories\CommentsRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class ArticlesController extends CorporateController
{
    public function __construct(ArticlesRepository $articles_repository, PortfoliosRepository $portfolios_repository, CommentsRepository $comments_repository)
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu()));
        $this->bar = 'right';
        $this->portfolios_repository = $portfolios_repository;
        $this->articles_repository = $articles_repository;
        $this->comments_repository = $comments_repository;
        $this->template = 'corporate.articles';
    }
    
    public function index()
    {
        $getArticles = $this->getArticles();
        $content = view('corporate.articles_content',compact('getArticles'))->render();
        $this->vars = Arr::add($this->vars,'content',$content);
        $getComments = $this->getComments(config('settings.recent_comments'));
        $getPortfolios = $this->getPortfolios(config('settings.recent_portfolios'));
        $this->contentRightBar = view('corporate.articlesBar',compact('getPortfolios','getComments'));
        return $this->Output();
    }

    public function getComments($take)
    {
        $comments = $this->comments_repository->getAll(['id','text','name','email','domain','article_id','user_id'],$take);
        if($comments) {
            $comments->load('article','user');
        }
        return $comments;
    }

    public function getPortfolios($take)
    {
        $portfolios = $this->portfolios_repository->getAll(['id','title','text','alias','customer','images','filter_alias'],$take);
        return $portfolios;
    }

    public function show(string $id)
    {
        //
    }

    public function getArticles($alias = false)
    {
        $articles = $this->articles_repository->getAll(['id','user_id','title','alias','description','images','created_at','category_id'],false,true);
        if($articles) {
            $articles->load('user','category','comments');
        }
        return $articles;
    } 

}
