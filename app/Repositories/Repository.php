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
        return $this->check($builder->get());
    }
    protected function check($result)
    {
        if($result->isEmpty()) {
            return false;
        }
        $result->transform(function($item,$key) 
        {
            if(is_string($item->images) && is_object(json_decode($item->images)) && json_last_error() == JSON_ERROR_NONE) {
                $item->images = json_decode($item->images);
            }
            return $item;
        });
        return $result;
    }
}