<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PortfoliosController extends CorporateController
{
    public function __construct(PortfoliosRepository $portfolios_repository)
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu()));
        $this->portfolios_repository = $portfolios_repository;
        $this->template = 'corporate.portfolios';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->title = 'Портфолио';
        $this->keywords = 'Авторы, Пользователи, Статьи';
        $this->descriptions = 'Авторы создавшие статьи';
        $getPortfolios = $this->getPortfolios();
        $content = view('corporate.portfolios_content',compact('getPortfolios'))->render();
        $this->vars = Arr::add($this->vars,'content',$content);
        return $this->Output();
    }

    public function getPortfolios()
    {
        $portfolios = $this->portfolios_repository->getAll('*',false,true);
        if($portfolios) {
            $portfolios->load('filter');
        }
        return $portfolios;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
