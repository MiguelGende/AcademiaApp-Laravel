<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NoticiasControler;


Route::get('/', function() {
    echo "API WORKS";
});

Route::get('/news', [NoticiasControler::class, 'index']);