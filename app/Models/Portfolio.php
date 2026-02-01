<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Filter;

class Portfolio extends Model
{
    public function filter()
    {
       return $this->belongsTo(Filter::class, 'filter_alias', 'alias');
    }
}