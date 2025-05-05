@extends('template.base')

@section('title', 'Dashboard')

@section('content')

    <h1>Noticias</h1>
  <!-- Contenido principal -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <!-- Noticia 1 -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nuevo curso: Laravel desde cero</h3>
            </div>
            <div class="card-body">
              <p>Se ha abierto la inscripción al nuevo curso intensivo de Laravel. Aprende a desarrollar aplicaciones web modernas desde cero con el framework PHP más popular.</p>
              <a href="#" class="btn btn-info btn-sm">Leer más</a>
            </div>
            <div class="card-footer text-muted">
              Publicado el 25 de abril de 2025
            </div>
          </div>
        </div>

        <!-- Noticia 2 -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Actualización del módulo de JavaScript</h3>
            </div>
            <div class="card-body">
              <p>El contenido del módulo de JavaScript ha sido actualizado con nuevas prácticas sobre ES2023 y proyectos reales de frontend.</p>
              <a href="#" class="btn btn-info btn-sm">Leer más</a>
            </div>
            <div class="card-footer text-muted">
              Publicado el 20 de abril de 2025
            </div>
          </div>
        </div>

        <!-- Noticia 3 -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Alianzas con empresas tecnológicas</h3>
            </div>
            <div class="card-body">
              <p>Nuestra academia ha firmado convenios con empresas del sector tecnológico para facilitar prácticas profesionales a nuestros estudiantes.</p>
              <a href="#" class="btn btn-info btn-sm">Leer más</a>
            </div>
            <div class="card-footer text-muted">
              Publicado el 15 de abril de 2025
            </div>
          </div>
        </div>

        <!-- Noticia 4 -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Próximo webinar: Introducción a Angular</h3>
            </div>
            <div class="card-body">
              <p>Este viernes a las 18:00 h realizaremos un webinar gratuito sobre los fundamentos de Angular para principiantes. ¡Reserva tu plaza!</p>
              <a href="#" class="btn btn-info btn-sm">Leer más</a>
            </div>
            <div class="card-footer text-muted">
              Publicado el 10 de abril de 2025
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
