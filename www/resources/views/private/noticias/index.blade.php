@extends('private.template.base')

@section('title', 'Noticias')

@section('content')

<!-- Estilo local solo para esta vista -->
<style>
   html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Previene el scroll horizontal general */
}

.content-wrapper.custom-full-width {
    width: 100%;
    margin-left: 0 !important;
    padding: 1rem;
    box-sizing: border-box;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    overflow-x: hidden; /* Añadido para prevenir el desbordamiento con sidebar colapsado */
}

/* Asegurar que los contenedores internos no causen scroll lateral */
.container-fluid {
    width: 100%;
    max-width: 100%; /* Nueva línea para limitar ancho máximo */
    padding: 0 1rem;
    box-sizing: border-box;
    overflow-x: hidden;
}

/* Row y columnas bien alineadas sin empujes */
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
    <!-- Título de la página -->
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="mb-2">Últimas Noticias sobre Tecnología</h1>
        </div>
    </section>

    <!-- Contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row g-3">
                @foreach ($noticias as $noticia)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-primary card-outline h-100 w-100">
                            <div class="card-header">
                                <h5 class="card-title">{{ $noticia['titulo'] }}</h5>
                                <div class="card-tools">
                                    <span class="badge badge-info">{{ $noticia['categoria'] }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $noticia['contenido'] }}</p>
                            </div>
                            <div class="card-footer text-muted">
                                Publicado el {{ $noticia['fecha'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
