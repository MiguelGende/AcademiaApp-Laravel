@extends('private.template.base')

@section('title', 'Listado de Noticias')

@section('content')

<style>
        /* Contenedor principal */
        .noticias-wrapper {
            width: 100% !important;
            padding: 20px !important;
            box-sizing: border-box !important;
            margin: 0 !important;
        }
        
        /* Grid de tarjetas - 3 por fila */
        .noticias-row {
            display: grid !important;
            grid-template-columns: repeat(3, 1fr) !important;
            gap: 20px !important;
            margin-top: 20px !important;
            width: 100% !important;
        }
        
        /* Elimina estilos por defecto de columnas */
        .noticia-col {
            width: auto !important;
            float: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        
        /* Tarjetas */
        .noticia-card {
            background: white !important;
            border-radius: 8px !important;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1) !important;
            overflow: hidden !important;
            transition: all 0.3s ease !important;
            display: flex !important;
            flex-direction: column !important;
            height: 100% !important;
        }
        
        .noticia-card:hover {
            transform: translateY(-5px) !important;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15) !important;
        }
        
        /* Encabezado */
        .card-header {
            background: #3498db !important;
            color: white !important;
            padding: 15px !important;
            border: none !important;
        }
        
        .card-title {
            margin: 0 !important;
            font-size: 1.1rem !important;
            color: white !important;
        }
        
        /* Cuerpo */
        .card-body {
            padding: 15px !important;
            flex-grow: 1 !important;
        }
        
        /* Pie */
        .card-footer {
            background: #f8f9fa !important;
            padding: 10px 15px !important;
            border-top: 1px solid #eee !important;
            font-size: 0.85rem !important;
            color: #6c757d !important;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .noticias-row {
                grid-template-columns: repeat(2, 1fr) !important;
            }
        }
        
        @media (max-width: 768px) {
            .noticias-row {
                grid-template-columns: 1fr !important;
            }
            
            .noticias-wrapper {
                padding: 15px !important;
            }
        }
    </style>

<div class="noticias-wrapper">
    <section class="content-header">
        <h1>Noticias Recientes</h1>
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Volver</a>
    </section>

    <div class="noticias-row">
        @forelse($noticias as $noticia)
            <div class="noticia-col">
                <div class="noticia-card">
                    <div class="card-header">
                        <h6 class="text-primary mb-1">
                            {{ $noticia->categoria?->name ?? 'Sin categoría' }}
                        </h6>
                        <h3 class="card-title">{{ $noticia->title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="news-content">
                            {!! nl2br(e($noticia->content)) !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">
                            <i class="far fa-calendar-alt mr-1"></i>
                            {{ $noticia->published_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No hay noticias disponibles</div>
            </div>
        @endforelse
    </div>
</div>

@endsection




