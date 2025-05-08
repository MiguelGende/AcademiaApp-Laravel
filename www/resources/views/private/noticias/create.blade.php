@extends('private.template.base')

@section('title', 'Crear Noticia')

@section('content')

<!-- Estilo local para centrar y optimizar el formulario -->
<style>
    .content-wrapper.custom-full-width {
        width: 100%;
        margin-left: 0 !important;
        padding: 1rem;
        box-sizing: border-box;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .form-container {
        max-width: 700px;
        margin: 0 auto; /* Centrado horizontal */
        background: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .form-container h1 {
        margin-bottom: 1rem;
    }

    .form-container .btn {
        margin-top: 1rem;
    }
</style>

<div class="content-wrapper custom-full-width">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Crear Nueva Noticia</h1>
            <a href="{{ route('noticias') }}" class="btn btn-secondary">Volver</a>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('noticias.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Título noticia</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea name="content" class="form-control" rows="5" ></textarea>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" name="is_published" class="form-check-input" id="is_published">
                    <label class="form-check-label" for="is_published">¿Publicar ahora?</label>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Noticia</button>
            </form>
        </div>
    </section>
</div>
@endsection
