<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\SecretariaController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/private/dashboard', 301);

Route::get('/private/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
        

Route::get('private/cursos', [CursosController::class, 'index'])
            ->name('cursos');

Route::get('/private/alumnos', [AlumnosController::class, 'index'])
            ->name('alumnos');

Route::get('/private/calendario', [CalendarioController::class, 'index'])
            ->name('calendario');

Route::get('/private/noticias', [NoticiasController::class, 'index'])
            ->name('noticias');

Route::get('/private/secretaria', [SecretariaController::class, 'index'])
            ->name('secretaria');

Route::get('/private/login', [AuthController::class, 'index'])
            ->name('login');            