<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Получить все модели, владеющие commentable.
     */
    public function company()
    {
        return $this->morphTo();
    }
}
