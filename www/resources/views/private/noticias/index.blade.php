@extends('private.template.base')

@section('title', 'Noticias')

@section('content')

<!-- Estilo local solo para esta vista -->
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .content-wrapper.custom-full-width {
        width: 100%;
        margin-left: 0 !important;
        padding: 1rem;
        box-sizing: border-box;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        overflow-x: hidden;
    }

    .container-fluid {
        width: 100%;
        max-width: 100%;
        padding: 0 1rem;
        box-sizing: border-box;
        overflow-x: hidden;
    }

    .row.g-3 {
        margin-left: -0.5rem;
        margin-right: -0.5rem;
        flex-wrap: wrap;
    }

    .row.g-3 > [class^="col"] {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        display: flex;
    }

    .card.h-100 {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .card-body {
        flex-grow: 1;
    }
</style>

<div class="content-wrapper custom-full-width">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Listado de Noticias</h1>
            <a href="{{ route('noticias.create') }}" class="btn btn-success">Crear Nueva Noticia</a>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            {{-- Mensajes de éxito --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Mensajes de error --}}
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoría(s)</th>
                        <th>Publicado</th>
                        <th>Fecha de Publicación</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($noticias as $noticia)
                        <tr>
                            <td>{{ $noticia->title }}</td>
                            <td>
                                @forelse($noticia->categories as $categoria)
                                    <span class="badge badge-primary">{{ $categoria->name }}</span>
                                @empty
                                    <span class="badge badge-secondary">Sin categoría</span>
                                @endforelse
                            </td>
                            <td>
                                @if ($noticia->is_published)
                                    <span class="badge badge-success">Sí</span>
                                @else
                                    <span class="badge badge-secondary">No</span>
                                @endif
                            </td>
                            <td>{{ $noticia->published_at ? $noticia->published_at->format('d/m/Y H:i') : '-' }}</td>
                            <td>{{ $noticia->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-sm btn-primary">Editar</a>

                                <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta noticia?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay noticias registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </section>
</div>

@endsection
