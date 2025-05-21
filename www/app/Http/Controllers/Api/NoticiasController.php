<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;


class NoticiasController extends Controller
{
    // Api que consumirá la APP de ionic
   public function index(Request $request)
    {
        $query = News::query();

        // Filtrar por categoría si se proporciona
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $news = $query->latest()->get();

        return response()->json([
            'result' => "OK",
            'message' => "Datos obtenidos correctamente",
            'success' => true,
            'data' => $news,
        ]);
    }  
}