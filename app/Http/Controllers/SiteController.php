<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\MenusRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $title;
    protected $keywords;
    protected $description;
    protected $portfolios_repository;
    protected $sliders_repository;
    protected $articles_repository;
    protected $menus_repository;
    protected $template;
    protected $vars;
    protected $contentRightBar = false;
    protected $contentLeftBar = false;
    protected $bar = 'no';

    public function __construct(MenusRepository $menus_repository)
    {
        $this->menus_repository = $menus_repository;
    }

    protected function renderOutput()
    {
        $menu = $this->getMenu();
        $navigation = view(env('CORP').'.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        if($this->contentRightBar) {
            $rightBar = view(env('CORP').'.rightBar')->with('content_rightBar',$this->contentRightBar)->render();
            $this->vars = array_add($this->vars,'rightBar',$rightBar);
        }

        $this->vars = array_add($this->vars,'bar',$this->bar);

        $this->vars = array_add($this->vars,'title',$this->title);
        $this->vars = array_add($this->vars,'keywords',$this->keywords);
        $this->vars = array_add($this->vars,'description',$this->description);

        $footer = view(env('CORP').'.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);

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
