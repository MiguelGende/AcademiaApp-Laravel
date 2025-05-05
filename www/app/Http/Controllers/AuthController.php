<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   // public function index(Request $request)
   // {
   //     return view('private.login.index');
   // }

    // Muestra el formulario de registro
    public function showRegisterForm()
    {
        return view('public.home.register');
    }

    // Maneja el registro de un nuevo usuario
    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario (esto es solo un ejemplo, debes usar un modelo y guardar en la base de datos)
        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encriptar la contraseña
        ]);

        // Redirigir al usuario a la página de login o al dashboard, dependiendo de tu flujo
        return redirect()->route('login')->with('status', 'Registro exitoso! Ahora puedes iniciar sesión.');
    }
}
