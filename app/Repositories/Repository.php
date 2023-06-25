<?php

namespace App\Repositories;

use Config;
abstract class Repository
{
    protected $model = false;
    public function get($select = '*', $number = false)
    {
        $builder = $this->model->select($select);
        if ($number)
        {
            $builder->take($number);
        }
        return $builder->get();
    }
}
