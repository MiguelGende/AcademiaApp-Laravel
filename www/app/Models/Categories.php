<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relación muchos a muchos con la tabla de noticias
     */
    public function news()
    {
        return $this->belongsToMany(News::class, 'news_has_categories', 'categories_id', 'news_id');
    }
}
