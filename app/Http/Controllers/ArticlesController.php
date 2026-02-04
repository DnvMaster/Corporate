<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ArticlesController extends CorporateController
{
    public function __construct(ArticlesRepository $articles_repository, PortfoliosRepository $portfolios_repository)
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu()));
        $this->bar = 'right';
        $this->portfolios_repository = $portfolios_repository;
        $this->articles_repository = $articles_repository;
        $this->template = 'corporate.articles';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getArticles = $this->getArticles();
        $content = view('corporate.articles_content',compact('getArticles'))->render();
        $this->vars = Arr::add($this->vars,'content',$content);

        return $this->Output();
    }

    public function show(string $id)
    {
        //
    }

    public function getArticles($alias = false)
    {
        $articles = $this->articles_repository->getAll(['id','user_id','title','alias','description','images','created_at','category_id'],false,true);
        if($articles) {
            // $articles->load('user','category','comments');
        }
        return $articles;
    } 

}
