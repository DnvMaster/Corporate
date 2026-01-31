<?php

namespace App\Repositories;
use Config;

abstract class Repository
{
    protected $model = false;

    public function getAll()
    {
        $builder = $this->model::select('*');
        return $builder->get();
    }
}