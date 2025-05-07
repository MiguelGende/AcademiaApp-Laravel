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
            <h1 class="mb-2">Últimas Noticias sobre Tecnología</h1>
            <a href="{{ route('noticias.create') }}" class="btn btn-primary">Añadir Noticia</a>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row g-3">
                @foreach ($noticias as $noticia)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-primary card-outline h-100 w-100">
                            <div class="card-header d-flex justify-content-between">
                                <h5 class="card-title">{{ $noticia['titulo'] }}</h5>
                                <span class="badge badge-info">{{ $noticia['categoria'] }}</span>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $noticia['contenido'] }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <small>Publicado el {{ $noticia['fecha'] }}</small>
                                <div class="d-flex gap-2">
                                    <!-- Botón Editar -->
                                    <a href="{{ route('noticias.edit', $noticia['id']) }}" class="btn btn-sm btn-primary">
                                        Editar
                                    </a>

                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('noticias.destroy', $noticia['id']) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta noticia?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (count($noticias) === 0)
                    <div class="col-12">
                        <div class="alert alert-info">No hay noticias disponibles.</div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
