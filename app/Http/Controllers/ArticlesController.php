<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function index($category_alias = false)
    {
        $this->title = 'Блог';
        $this->keywords = 'Статьи, Изображения, Комментарии';
        $this->descriptions = 'Авторские статьи в разделе блог';

        $getArticles = $this->getArticles($category_alias);
        $content = view('corporate.articles_content',compact('getArticles'))->render();
        $this->vars = Arr::add($this->vars,'content',$content);
        $getComments = $this->getComments(config('settings.recent_comments'));
        $getPortfolios = $this->getPortfolios(config('settings.recent_portfolios'));
        $this->contentRightBar = view('corporate.articlesBar',compact('getPortfolios','getComments'));
        return $this->Output();

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

    public function show($alias = false)
    {

        $article = $this->articles_repository->one($alias,['comments'=>true]);
        if($article) {
            $article->images = json_decode($article->images);
        }

        $this->title = $article->title;
        $this->keywords = $article->keywords;
        $this->descriptions = $article->descriptions;

        $content = view('corporate.article_content', compact('article'))->render();
        $this->vars = Arr::add($this->vars,'content',$content);

        $getComments = $this->getComments(config('settings.recent_comments'));
        $getPortfolios = $this->getPortfolios(config('settings.recent_portfolios'));
        $this->contentRightBar = view('corporate.articlesBar',compact('getPortfolios','getComments'));
        return $this->Output();
    }

    public function getArticles($alias = false)
    {
        $where = false;
        if($alias) {
            $id = Category::select('id')->where('alias',$alias)->first()->id;
             $where = ['category_id',$id];
        }
        $articles = $this->articles_repository->getAll(['id','user_id','title','alias','description','images','created_at','category_id','keywords','descriptions'],false,true,$where);
        if($articles) {
            $articles->load('user','category','comments');
        }
        return $articles;
    }

}
