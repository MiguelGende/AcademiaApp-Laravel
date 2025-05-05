<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('public.home.index');
    }

    public function login(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    // Autenticación simulada
    if ($email === 'usuario@demo.com' && $password === '123456') {
        Session::put('auth', true);  // Almacena 'auth' en la sesión
        Session::put('user', $email); // Almacena el email del usuario en la sesión
        
        
        return redirect('/private/dashboard');  // Redirige al dashboard
    }

    return back()->withErrors(['email' => 'Credenciales inválidas'])->withInput();
}


    public function logout()
    {
        Session::flush();  // Elimina todos los datos de sesión
        return view('public.home.index');  // Redirige al login
    }
}
