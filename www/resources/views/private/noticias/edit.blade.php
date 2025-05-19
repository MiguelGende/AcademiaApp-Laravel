@extends('private.template.base')

@section('title', 'Editar Noticia')

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
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <h1>Editar Noticia</h1>
            <a href="{{ route('noticias') }}" class="btn btn-secondary">Volver</a>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('noticias.update', $noticia->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $noticia->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea name="content" class="form-control" rows="5" required>{{ old('content', $noticia->content) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="categories">Categorías</label>
                    <select name="categories[]" id="categories" class="form-control" multiple required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ in_array($categoria->id, old('categories', $noticiaCategorias)) ? 'selected' : '' }}>
                                {{ $categoria->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" name="is_published" class="form-check-input" id="is_published" {{ $noticia->is_published ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">¿Publicar ahora?</label>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Noticia</button>
            </form>
        </div>
    </section>
</div>

@endsection