<?php

namespace App\Http\Controllers;

use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NoticiasController extends Controller
{
    public function index(Request $request)
    {
        //$noticias = News::latest()->get();
        $noticias = News::orderByDesc('created_at')->get();
        return view('private.noticias.index', compact('noticias'));
    }

    public function create(Request $request)
    {
        return view('private.noticias.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255|unique:news',
                'content' => 'required|string',
                //'is_published' => 'nullable|boolean',
                //'published_at' => 'nullable|date',
            ]);
        
            
            News::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'is_published' => $request->has('is_published'),
                'published_at' => $request->published_at ?? null
                //$request->is_published ? ($request->published_at ?? Carbon::now()) : null,
            ]);

            return redirect()->route('noticias')->with('success', 'Noticia creada correctamente.');
        } catch(Exception $e) {
            dd($e);
        }
    }

    public function edit($id)
    {
        $noticia = News::findOrFail($id);
        return view('private.noticias.edit', compact('noticia'));
    }

    public function update(Request $request, $id)
    {
        $noticia = News::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255|unique:news,title,' . $noticia->id,
            'contenido' => 'required|string',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        $noticia->update([
            'title' => $request->titulo,
            'content' => $request->contenido,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->is_published ? ($request->published_at ?? Carbon::now()) : null,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy($id)
    {
        $noticia = News::findOrFail($id);
        $noticia->delete();

        return redirect()->route('noticias.index')->with('success', 'Noticia eliminada correctamente.');
    }
}
