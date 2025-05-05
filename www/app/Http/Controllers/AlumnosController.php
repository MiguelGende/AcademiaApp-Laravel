<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function index(Request $request)
    {
        return view('private.alumnos.index');
    }
}
