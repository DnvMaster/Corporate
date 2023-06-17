<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use Illuminate\Support\Arr;
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
    public function __construct(MenusRepository $menus_repository)
    {
        $this->menus_repository = $menus_repository;
    }
    protected function templateOutput()
    {
        #  -- menu navigation section  --
        $menu = $this->getMenu();
        dd($menu);

        $navigation = view(env('MASTER').'.navigation')->render();
        $this->vars = Arr::add($this->vars,'navigation',$navigation);
        return view($this->template)->with($this->vars);
    }
    protected function getMenu()
    {
        $menu = $this->menus_repository->get();
        return $menu;
    }
}
