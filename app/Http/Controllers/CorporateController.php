<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

    protected function __construct(MenusRepository $menus_repository)
    {
        $this->menus_repository = $menus_repository;
    }

    protected function Output()
    {
        $menu = $this->getMenu();
        dd($menu);
        $header = view('corporate.header')->render();
        $this->vars = Arr::add($this->vars,'header',$header);

        return view($this->template)->with($this->vars);
    }

    protected function getMenu()
    {
        $menu = $this->menus_repository->get();
        return $menu;
    }
}
