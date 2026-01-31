<?php

namespace App\Http\Controllers;

use Lavary\Menu\Facade as Menu;
use Illuminate\Http\Request;
use App\Repositories\MenusRepository;
use Illuminate\Support\Arr;

class CorporateController extends Controller
{   
    protected $menus_repository;
    protected $sliders_repository;
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
        $header = view('corporate.header', compact('menu'))->render();
        $this->vars = Arr::add($this->vars,'header',$header);

        return view($this->template, $this->vars);
    }

    protected function getMenu()
    {
        $menu = $this->menus_repository->getAll();
        $menuBuilder = Menu::make('MyNav', function($m) use($menu) {
            foreach($menu as $item) {
                if($item['parent'] == 0) {
                    $m->add($item['title'],$item['path'])->id($item['id']);
                } else {
                    if($m->find($item['parent'])) {
                        $m->find($item['parent'])->add($item['title'],$item['path'])->id($item['id']);
                    }
                }
            }
        });
        return $menuBuilder;
    }
}
