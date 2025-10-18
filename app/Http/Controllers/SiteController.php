<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\MenusRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $portfolios_repository;
    protected $sliders_repository;
    protected $articles_repository;
    protected $menus_repository;
    protected $template;
    protected $vars;
    protected $contentRightBar = false;
    protected $contentLeftBar = false;
    protected $bar = false;

    public function __construct(MenusRepository $menus_repository)
    {
        $this->menus_repository = $menus_repository;
    }

    protected function renderOutput()
    {
        $menu = $this->getMenu();
        $navigation = view(env('CORP').'.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);
        return view($this->template)->with($this->vars);
    }

    protected function getMenu()
    {
        $menu = $this->menus_repository->get();
        $menuBuilder = \Menu::make('Navigation',function($m) use($menu)
        {
            foreach($menu as $item)
            {
                if($item->parent == 0) {
                    $m->add($item->title,$item->path)->id($item->id);
                } else {
                    if($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                    }
                }
            }
        });
        return $menuBuilder;
    }
}
