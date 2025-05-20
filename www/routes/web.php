<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\SliderController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/

// Página de inicio pública
Route::get('/', [PublicController::class, 'index'])->name('public.home');

// Vista de registro
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Procesar formulario de registro (simulado)
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// Vista de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Procesar login (simulado)
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas Privadas (Requieren autenticación simulada)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth.simulado'])->group(function () {

    // Dashboard principal
    Route::get('/private/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Módulo de cursos
    Route::get('/private/cursos', [CursosController::class, 'index'])->name('cursos');

    // Módulo de alumnos
    Route::get('/private/alumnos', [AlumnosController::class, 'index'])->name('alumnos');

    // Módulo de calendario
    Route::get('/private/calendario', [CalendarioController::class, 'index'])->name('calendario');

    // Módulo de noticias (principal - para el sidebar)
    Route::get('/private/noticias', [NoticiasController::class, 'index'])->name('noticias');

    // Listado público de noticias (nueva ruta)
    Route::get('/private/noticias/listado', [NoticiasController::class, 'list'])->name('noticias.list');

    // CRUD de noticias
    Route::get('/private/noticias/crear', [NoticiasController::class, 'create'])->name('noticias.create');
    Route::post('/private/noticias', [NoticiasController::class, 'store'])->name('noticias.store');
    Route::get('/private/noticias/{id}/editar', [NoticiasController::class, 'edit'])->name('noticias.edit');
    Route::put('/private/noticias/{id}', [NoticiasController::class, 'update'])->name('noticias.update');
    Route::delete('/private/noticias/{id}', [NoticiasController::class, 'destroy'])->name('noticias.destroy');

    /*
    |--------------------------------------------------------------------------
    | Módulo de Sliders
    |--------------------------------------------------------------------------
    | - Listado + Formulario de creación en la misma vista (index)
    | - POST para guardar
    | - PATCH para cambiar estado (activo/inactivo)
    */

    // Mostrar todos los sliders y el formulario
    Route::get('/private/sliders', [SliderController::class, 'index'])->name('sliders.index');

    // Crear un nuevo slider (POST)
    Route::post('/private/sliders', [SliderController::class, 'create'])->name('sliders.create');

    // Alternar estado activo/inactivo (AJAX)
    Route::patch('/private/sliders/{id}/toggle', [SliderController::class, 'toggle'])->name('sliders.toggle');

    // Creación de categorías (resource completo)
    Route::resource('categories', App\Http\Controllers\CategoryController::class);

    // Secretaría
    Route::get('/private/secretaria', [SecretariaController::class, 'index'])->name('secretaria');
});
