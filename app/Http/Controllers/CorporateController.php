<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorporateController extends Controller
{
    protected $portfolios_repository;
    protected $sliders_repository;
    protected $articles_repository;
    protected $menus_repository;
    protected $template;
    protected $vars = array();
    protected $bar = false;
    protected $contentRightBar = false;
    protected $contentLeftBar = false;
    public function __construct()
    {
        //
    }
    protected function templateOutput()
    {
        return view($this->template)->with($this->vars);
    }

}
