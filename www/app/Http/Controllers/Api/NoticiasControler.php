<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;


class NoticiasControler extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        
        return response()->json([
            'result' => "OK",
            'message' => "Datos obtenidos correctamente",
            'success' => true,
            'data' => $news,
        ]);
    }
}