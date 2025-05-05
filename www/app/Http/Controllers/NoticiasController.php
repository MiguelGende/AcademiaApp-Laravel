<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function index(Request $request)
    {   // Esto simula una base de datos, esto se hara desde base de datos
        $noticias = [
            [
                'titulo' => 'Lanzan nueva IA que detecta errores de código en tiempo real',
                'categoria' => 'Inteligencia Artificial',
                'contenido' => 'Una startup ha desarrollado un modelo que analiza código fuente y propone correcciones de manera instantánea.',
                'fecha' => '2025-04-29',
            ],
            [
                'titulo' => 'Laravel 11 añade soporte nativo para WebSockets',
                'categoria' => 'Desarrollo Web',
                'contenido' => 'La nueva versión del framework PHP más popular incluye integración directa con WebSockets.',
                'fecha' => '2025-04-28',
            ],
            [
                'titulo' => 'Google lanza su nuevo chip para IA generativa',
                'categoria' => 'Inteligencia Artificial',
                'contenido' => 'El chip promete ser un 35% más eficiente en tareas de generación de lenguaje natural.',
                'fecha' => '2025-04-27',
            ],
            [
                'titulo' => 'React 19 mejora el manejo de estado con nueva API',
                'categoria' => 'Desarrollo Web',
                'contenido' => 'La comunidad celebra la nueva API que simplifica la gestión de estado global sin Redux.',
                'fecha' => '2025-04-26',
            ],
            [
                'titulo' => 'Microsoft presenta una IA que resume código fuente',
                'categoria' => 'Inteligencia Artificial',
                'contenido' => 'La herramienta está pensada para mejorar la documentación técnica en grandes proyectos.',
                'fecha' => '2025-04-25',
            ],
            [
                'titulo' => 'Python 4.0 traerá mejoras radicales en concurrencia',
                'categoria' => 'Informática',
                'contenido' => 'Se anuncia una nueva arquitectura que elimina el GIL (Global Interpreter Lock).',
                'fecha' => '2025-04-24',
            ],
            [
                'titulo' => 'Se lanza una nueva herramienta para testing de APIs REST',
                'categoria' => 'Desarrollo Web',
                'contenido' => 'Esta herramienta promete ser un reemplazo directo para Postman con funcionalidades avanzadas.',
                'fecha' => '2025-04-23',
            ],
            [
                'titulo' => 'IA ayuda a detectar vulnerabilidades en tiempo real',
                'categoria' => 'Ciberseguridad',
                'contenido' => 'Nuevos modelos de IA están siendo entrenados para encontrar vulnerabilidades antes del despliegue.',
                'fecha' => '2025-04-22',
            ],
            [
                'titulo' => 'Vue 4 adopta Composition API como estándar principal',
                'categoria' => 'Desarrollo Web',
                'contenido' => 'El framework apuesta por una API más flexible para proyectos grandes y escalables.',
                'fecha' => '2025-04-21',
            ],
            [
                'titulo' => 'Curso gratuito sobre Machine Learning para desarrolladores web',
                'categoria' => 'Educación',
                'contenido' => 'El curso ofrece una introducción a modelos supervisados y no supervisados con ejemplos prácticos.',
                'fecha' => '2025-04-20',
            ],
        ];
    
        return view('private.noticias.index', compact('noticias'));
    }
}
