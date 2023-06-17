<?php

namespace App\Repositories;

use App\Models\Slider;

class SlidersRepository
{
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }
}
