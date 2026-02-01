<?php

namespace App\Repositories;
use Config;

abstract class Repository
{
    protected $model = false;

    public function getAll($select = '*',$take = false)
    {
        $builder = $this->model::select($select);
        if($take) {
            $builder->take($take);
        }
        return $builder->get();
    }
}