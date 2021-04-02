<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'inn',
        'description',
        'director',
        'address',
        'phone_number'
    ];

    /**
     * Получить все комментарии.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'company_id');
    }
}
