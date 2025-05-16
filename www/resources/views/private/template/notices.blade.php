<div class="noticias-dashboard">
    <h2 class="mb-4">Últimas Noticias</h2>
    <div class="row">
        @php
            $noticias = App\Models\News::where('is_published', true)
                                       ->orderByDesc('published_at')
                                       ->limit(4)
                                       ->get();
        @endphp

        @forelse($noticias as $noticia)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card card-info h-100">
                    <div class="card-header">
                        <h3 class="card-title">{{ Str::limit($noticia->title, 40) }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="news-excerpt">
                            {!! Str::limit(nl2br(e($noticia->content)), 80) !!}
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <small class="text-muted">
                            <i class="far fa-calendar-alt mr-1"></i>
                            {{ optional($noticia->published_at)->timezone(config('app.timezone'))->format('d/m/Y') }}
                        </small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info mb-0">No hay noticias recientes</div>
            </div>
        @endforelse
    </div>

    @if($noticias->count() > 0)
        <div class="text-center mt-2">
            <a href="{{ route('noticias.list') }}" class="btn btn-sm btn-outline-info">
                <i class="fas fa-newspaper mr-1"></i> Ver todas las noticias
            </a>
        </div>
    @endif
</div>


<style>
    .noticias-dashboard {
        font-size: 0.9rem;
    }
    .noticias-dashboard .card {
        transition: all 0.3s ease;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .noticias-dashboard .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .noticias-dashboard .card-header {
        padding: 0.75rem 1rem;
        background-color: #17a2b8;
        color: white;
    }
    .noticias-dashboard .card-title {
        font-size: 1rem;
        margin-bottom: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .news-excerpt {
        display: -webkit-box;
        -webkit-line-clamp: 3;  /* Limita a 3 líneas */
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 60px;
    }
</style>