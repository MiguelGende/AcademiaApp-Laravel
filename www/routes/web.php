<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('dashboard.index');
    return view('home');
});

// Ruta para Login
Route::get('/login', function () {
    return view('login'); // Crea el archivo login.blade.php
})->name('login');

// Ruta para Registro
Route::get('/register', function () {
    return view('register'); // Crea el archivo register.blade.php
})->name('register');

// Ruta para Cerrar Sesión (usar POST en lugar de GET)
Route::post('/logout', function () {
    // Lógica para cerrar sesión
    //auth()->logout();
    return redirect('/'); // O redirigir a una página específica
})->name('logout');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

