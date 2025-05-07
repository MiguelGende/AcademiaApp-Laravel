<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticiasController extends Controller
{
    public function index(Request $request)
    {
        $noticias = session('noticias', []);
        return view('private.noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('private.noticias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'contenido' => 'required|string',
        ]);

        $noticia = [
            'id' => Str::uuid()->toString(), // ID único
            'titulo' => $request->titulo,
            'categoria' => $request->categoria,
            'contenido' => $request->contenido,
            'fecha' => now()->toDateString(),
        ];

        $noticias = session('noticias', []);
        array_unshift($noticias, $noticia);
        session(['noticias' => $noticias]);

        return redirect()->route('noticias')->with('success', 'Noticia creada correctamente.');
    }

    public function edit($id)
    {
        $noticias = session('noticias', []);
        $noticia = collect($noticias)->firstWhere('id', $id);

        if (!$noticia) {
            return redirect()->route('noticias')->with('error', 'Noticia no encontrada.');
        }

        return view('private.noticias.edit', compact('noticia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'contenido' => 'required|string',
            'fecha' => 'required|date',
        ]);

        $noticias = session('noticias', []);
        foreach ($noticias as &$item) {
            if ($item['id'] === $id) {
                $item['titulo'] = $request->titulo;
                $item['categoria'] = $request->categoria;
                $item['contenido'] = $request->contenido;
                $item['fecha'] = $request->fecha;
                break;
            }
        }

        session(['noticias' => $noticias]);

        return redirect()->route('noticias')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy($id)
    {
        $noticias = session('noticias', []);
        $noticias = array_filter($noticias, fn($item) => $item['id'] !== $id);
        session(['noticias' => array_values($noticias)]);

        return redirect()->route('noticias')->with('success', 'Noticia eliminada correctamente.');
    }
}
