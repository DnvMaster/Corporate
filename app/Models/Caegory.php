<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caegory extends Model
{
    use HasFactory;
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
