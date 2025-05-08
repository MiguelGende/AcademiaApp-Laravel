<?php

namespace App\Http\Controllers;

use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class NoticiasController extends Controller
{
    public function index(Request $request)
    {
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
            ]);
            
            News::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'is_published' => $request->has('is_published'),
                'published_at' => $request->has('is_published') ? Carbon::now() : null
            ]);

            return redirect()->route('noticias')
                   ->with('success', 'Noticia creada correctamente.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                   ->withErrors($e->validator)
                   ->withInput();
                   
        } catch (Exception $e) {
            Log::error('Error al crear noticia: '.$e->getMessage());
            return redirect()->back()
                   ->with('error', 'Ocurrió un error al crear la noticia')
                   ->withInput();
        }
    }

    public function edit($id)
    {
        $noticia = News::findOrFail($id);
        return view('private.noticias.edit', compact('noticia'));
    }

    public function update(Request $request, $id)
    {
        try {
            $noticia = News::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255|unique:news,title,'.$noticia->id,
                'content' => 'required|string',
            ]);

            $noticia->update([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'is_published' => $request->has('is_published'),
                'published_at' => $request->has('is_published') ? Carbon::now() : null
            ]);

            return redirect()->route('noticias')
                   ->with('success', 'Noticia actualizada correctamente.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                   ->withErrors($e->validator)
                   ->withInput();
                   
        } catch (Exception $e) {
            Log::error('Error al actualizar noticia: '.$e->getMessage());
            return redirect()->back()
                   ->with('error', 'Ocurrió un error al actualizar la noticia')
                   ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $noticia = News::findOrFail($id);
            $noticia->delete();

            return redirect()->route('noticias')
                   ->with('success', 'Noticia eliminada correctamente.');

        } catch (Exception $e) {
            Log::error('Error al eliminar noticia: '.$e->getMessage());
            return redirect()->back()
                   ->with('error', 'Ocurrió un error al eliminar la noticia');
        }
    }

    public function list()
    {
        $noticias = News::where('is_published', true)
                  ->orderByDesc('published_at')
                  ->limit(15)
                  ->get();
    
        return view('private.noticias.list', compact('noticias'));
    }
}