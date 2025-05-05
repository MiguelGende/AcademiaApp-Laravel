<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index(Request $request)
    {
        return view('private.calendario.index');
    }
}
