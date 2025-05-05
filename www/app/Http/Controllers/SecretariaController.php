<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    public function index(Request $request)
    {
        return view('private.secretaria.index');
    }
}
