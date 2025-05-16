<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'content',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Relación muchos a muchos con la tabla de categorías
     */
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'news_has_categories', 'news_id', 'categories_id');
    }
}
