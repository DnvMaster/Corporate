<?php

namespace App\Repositories;

use App\Models\Article;

class ArticlesRepository
{
    public function __construct(Article  $article)
    {
        $this->model = $article;
    }
}
