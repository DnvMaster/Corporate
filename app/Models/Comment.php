<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    public function articles(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
