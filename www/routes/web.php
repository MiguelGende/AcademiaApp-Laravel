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

    // Módulo de noticias
    Route::get('/private/noticias', [NoticiasController::class, 'index'])->name('noticias');

    // Secretaría
    Route::get('/private/secretaria', [SecretariaController::class, 'index'])->name('secretaria');
});
