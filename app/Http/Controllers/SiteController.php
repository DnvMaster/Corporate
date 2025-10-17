<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $portfolio_repository;
    protected $slider_repository;
    protected $article_repository;
    protected $menu_repository;
    protected $template;
    protected $vars;
    protected $contentRightBar = false;
    protected $contentLeftBar = false;
    protected $bar = false;

    public function __construct()
    {
        // parent::__construct();
    }

    protected function renderOutput()
    {
        return view($this->template)->with($this->vars);
    }
}
