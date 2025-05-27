<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    
    // Definimos qué campos son asignables de forma masiva
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'link',
        'is_active',
        'order',
    ];

    // Casting para campos booleanos y numéricos
    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];


    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

}
