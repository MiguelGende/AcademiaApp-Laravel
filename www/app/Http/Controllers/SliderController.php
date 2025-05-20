<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('private.sliders.index');
        }

        if ($request->isMethod('post')) {
            // Validación
            $validated = $request->validate([
                'tituloSlider'      => 'required|string|max:255',
                'descripcionSlider' => 'nullable|string|max:255',
                'imagenSlider'      => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
                'linkSlider'        => 'nullable|url|max:255',
                'estadoSlider'      => 'nullable|boolean',
                'ordenSlider'       => 'nullable|integer|min:0',
            ]);

            // Crear nueva instancia del modelo
            $slider = new Slider();
            $slider->title       = $validated['tituloSlider'];
            $slider->description = $validated['descripcionSlider'] ?? null;
            $slider->link        = $validated['linkSlider'] ?? null;
            $slider->is_active   = $validated['estadoSlider'] ?? true;
            $slider->order       = $validated['ordenSlider'] ?? 0;

            // Guardar imagen si se subió
            if ($request->hasFile('imagenSlider')) {
                $imagePath = $request->file('imagenSlider')->store('slider', 'public');
                $slider->image_path = $imagePath;
            }

            // Guardar en base de datos
            $slider->save();

            // Redirigir con mensaje
            return redirect()->route('sliders.index')->with('success', 'Slider creado con éxito');
        }
    }

    public function toggle($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->is_active = !$slider->is_active;
        $slider->save();

    return response()->json([
        'success' => true,
        'new_status' => $slider->is_active,
    ]);
    }

    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('private.sliders.index', compact('sliders'));
    }
    


}
