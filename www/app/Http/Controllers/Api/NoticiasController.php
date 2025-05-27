<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Slider;
use Illuminate\Http\Request;


class NoticiasController extends Controller
{
    // Api que consumirá la APP de ionic
   public function index(Request $request)
    {
        $query = News::query();

        // Filtrar por categoría si se proporciona
        if ($request->has('categories_id')) {
            $query->where('categories_id', $request->categories_id);
        }

        $news = $query->latest()->get();

        return response()->json([
            'result' => "OK",
            'message' => "Datos obtenidos correctamente",
            'success' => true,
            'data' => $news,
        ]);
    }
    
    
    public function slidersByCategory($categoryId)
    {
        $sliders = Slider::where('categories_id', $categoryId)->where('is_active', true)->get();

        return response()->json([
            'result' => 'OK',
            'message' => 'Sliders obtenidos correctamente',
            'success' => true,
            'data' => $sliders,
        ]);
    }

}