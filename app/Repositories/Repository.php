<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Facades\Config;
abstract class Repository
{
    protected $model = false;
    public function getAll($select = '*',$take = false, $pagination = false, $where = false)
    {
        $builder = $this->model::select($select);
        if($take) {
            $builder->take($take);
        }
        if($where) {
            $builder->where($where[0],$where[1]);
        }
        if($pagination) {
            return $this->check($builder->paginate(Config::get('settings.paginate')));
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

    public function one($alias, $attr = array())
    {
        return Article::where('alias',$alias)->first();
    }
}
