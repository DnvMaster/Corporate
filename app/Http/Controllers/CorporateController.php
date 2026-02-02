<?php

namespace App\Http\Controllers;

use Lavary\Menu\Facade as Menu;
use Illuminate\Http\Request;
use App\Repositories\MenusRepository;
use Illuminate\Support\Arr;

class CorporateController extends Controller
{   
    protected $title;
    protected $keywords;
    protected $description;
    protected $menus_repository;
    protected $sliders_repository;
    protected $portfolios_repository;
    protected $articles_repository;
    protected $template;
    protected $vars = array();
    protected $contentLeftBar = false;
    protected $contentRightBar = false;
    protected $bar = '';

    protected function __construct(MenusRepository $menus_repository)
    {
        $this->menus_repository = $menus_repository;
    }

    protected function Output()
    {

        $this->vars = Arr::add($this->vars, 'title', $this->title);
        $this->vars = Arr::add($this->vars, 'keywords', $this->keywords);
        $this->vars = Arr::add($this->vars, 'description', $this->description);

        $menu = $this->getMenu();
        $header = view('corporate.header', compact('menu'))->render();
        $this->vars = Arr::add($this->vars,'header',$header);

        if($this->contentRightBar) {
            $rightBar = view('corporate.rightBar')->with('content_rightBar',$this->contentRightBar)->render();
            $this->vars = Arr::add($this->vars,'rightBar',$rightBar);
        }

        $this->vars = Arr::add($this->vars,'bar',$this->bar);

        $footer = view('corporate.footer')->render();
        $this->vars = Arr::add($this->vars,'footer',$footer);

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
