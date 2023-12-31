<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Menu;

class CorporateController extends Controller
{
    protected $portfolios_repository;
    protected $sliders_repository;
    protected $articles_repository;
    protected $menus_repository;

    protected $title;
    protected $keywords;
    protected $description;

    protected $template;
    protected $vars = array();
    protected $bar = 'no';
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

        $navigation = view(env('MASTER').'.navigation')->with('menu',$menu)->render();
        $this->vars = Arr::add($this->vars,'navigation',$navigation);

        $this->vars = Arr::add($this->vars,'bar', $this->bar);

        $this->vars = Arr::add($this->vars,'title', $this->title);
        $this->vars = Arr::add($this->vars,'keywords', $this->keywords);
        $this->vars = Arr::add($this->vars,'description', $this->description);

        if ($this->contentRightBar)
        {
            $rightBar = view(env('MASTER').'.rightBar')->with('content_rightBar',$this->contentRightBar)->render();
            $this->vars = Arr::add($this->vars,'rightBar',$rightBar);
        }

        $footer = view(env('MASTER').'.footer')->render();
        $this->vars = Arr::add($this->vars,'footer',$footer);

        return view($this->template)->with($this->vars);
    }
    protected function getMenu()
    {
        $menu = $this->menus_repository->get();
        $mBuilder = Menu::make('MyNav',function ($m) use ($menu)
        {
            foreach ($menu as $item)
            {
                if ($item->parent == 0)
                {
                    $m ->add($item->title,$item->path)->id($item->id);
                } else {
                    if ($m->find($item->parent))
                    {
                        $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }
}
