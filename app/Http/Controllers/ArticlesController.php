<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;

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
        dd($getArticles);
        return $this->Output();
    }

    public function getArticles($alias = false)
    {
        $articles = $this->articles_repository->getAll(['title','alias','description','images','created_at'],false,true);
        if($articles) {
            // $articles->load('user','category','comments');
        }
        return $articles;
    } 
}
