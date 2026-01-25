<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorporateController extends Controller
{
    protected $menus_repository;
    protected $sliders_repository;
    protected $portfolios_repository;
    protected $articles_repository;
    protected $template;
    protected $vars = array();
    protected $leftBar = false;
    protected $rightBar = false;
    protected $bar = false;

    protected function __construct()
    {
        // 
    }

    protected function Output()
    {
        return view($this->template)->with($this->vars);
    }
}
