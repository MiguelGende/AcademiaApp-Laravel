@extends('private.template.base')

@section('title', 'Cursos Disponibles')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Oferta de Cursos</h1>
    <div class="row">
        @php
            $cursos = [
                [
                    'nombre' => 'Laravel',
                    'descripcion' => 'Framework de PHP para desarrollar aplicaciones web modernas con estructura MVC.',
                    'inicio' => '2025-06-01',
                    'fin' => '2025-07-15'
                ],
                [
                    'nombre' => 'CSS',
                    'descripcion' => 'Lenguaje de estilos para diseñar y estructurar visualmente páginas web.',
                    'inicio' => '2025-06-10',
                    'fin' => '2025-07-20'
                ],
                [
                    'nombre' => 'Bases de Datos',
                    'descripcion' => 'Aprende SQL, modelado relacional y gestión de bases de datos como MySQL y PostgreSQL.',
                    'inicio' => '2025-07-01',
                    'fin' => '2025-08-10'
                ],
                [
                    'nombre' => 'Angular',
                    'descripcion' => 'Framework de desarrollo frontend basado en TypeScript, ideal para SPAs modernas.',
                    'inicio' => '2025-06-15',
                    'fin' => '2025-07-30'
                ],
                [
                    'nombre' => 'PHP',
                    'descripcion' => 'Lenguaje de programación backend ampliamente usado para crear sitios dinámicos.',
                    'inicio' => '2025-06-20',
                    'fin' => '2025-08-05'
                ],
                [
                    'nombre' => 'Ciberseguridad',
                    'descripcion' => 'Fundamentos de seguridad informática, protección de datos y auditorías de sistemas.',
                    'inicio' => '2025-07-05',
                    'fin' => '2025-08-20'
                ]
            ];
        @endphp

        @foreach ($cursos as $curso)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-primary shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title text-primary">{{ $curso['nombre'] }}</h5>
                    <p class="card-text">{{ $curso['descripcion'] }}</p>
                    <p class="mb-1"><strong>Inicio:</strong> {{ \Carbon\Carbon::parse($curso['inicio'])->format('d/m/Y') }}</p>
                    <p><strong>Finalización:</strong> {{ \Carbon\Carbon::parse($curso['fin'])->format('d/m/Y') }}</p>
                    <button class="btn btn-outline-primary mt-auto apuntarse-btn" data-curso="{{ $curso['nombre'] }}">Apuntarme</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.apuntarse-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const curso = btn.dataset.curso;
            alert(`Te has apuntado al curso de ${curso} (simulado)`);
        });
    });
});
</script>
@endsection
