<?php

use App\Http\Controllers\Api\NoticiasController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    echo "API WORKS";
});

Route::get('/news', [NoticiasController::class, 'index']);