@extends('private.template.base')

@section('title', 'Cursos')


@section('content')
<div class="container-fluid">
<h1>Cursos Activos</h1>
    <div class="row">
        {{-- Noticia 1 --}}
        <div class="col-md-6">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/noticia1.jpg') }}" alt="Curso de Laravel">
                <div class="card-body">
                    <h5 class="card-title">Nuevo Curso de Laravel Disponible</h5>
                    <p class="card-text">
                        ¡Ya puedes inscribirte en nuestro curso intensivo de Laravel 11! Aprende a construir aplicaciones web modernas desde cero.
                    </p>
                    <a href="#" class="btn btn-primary">Leer más</a>
                </div>
            </div>
        </div>

        {{-- Noticia 2 --}}
        <div class="col-md-6">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/noticia2.jpg') }}" alt="Curso de Angular">
                <div class="card-body">
                    <h5 class="card-title">Bootcamp de Angular con Proyecto Final</h5>
                    <p class="card-text">
                        Apúntate al nuevo bootcamp de Angular y desarrolla un proyecto profesional guiado por expertos del sector.
                    </p>
                    <a href="#" class="btn btn-primary">Leer más</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Noticia 3 --}}
        <div class="col-md-6">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/noticia3.jpg') }}" alt="Nuevas aulas equipadas">
                <div class="card-body">
                    <h5 class="card-title">Nuevas Aulas Equipadas con Tecnología de Punta</h5>
                    <p class="card-text">
                        Nuestra academia ha renovado sus instalaciones para ofrecer una mejor experiencia de aprendizaje.
                    </p>
                    <a href="#" class="btn btn-primary">Leer más</a>
                </div>
            </div>
        </div>

        {{-- Noticia 4 --}}
        <div class="col-md-6">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/noticia4.jpg') }}" alt="Certificaciones">
                <div class="card-body">
                    <h5 class="card-title">Alianzas para Certificaciones Oficiales</h5>
                    <p class="card-text">
                        Nos hemos aliado con instituciones certificadoras para que puedas obtener títulos oficiales al completar tus cursos.
                    </p>
                    <a href="#" class="btn btn-primary">Leer más</a>
                </div>
            </div>
        </div>
        <div class="row">
    {{-- Noticia 5 --}}
    <div class="col-md-6">
        <div class="card">
            <img class="card-img-top" src="{{ asset('images/noticia5.jpg') }}" alt="Taller de ciberseguridad">
            <div class="card-body">
                <h5 class="card-title">Taller Gratuito de Ciberseguridad</h5>
                <p class="card-text">
                    Participa en nuestro próximo taller introductorio sobre ciberseguridad y aprende a proteger tus aplicaciones web de amenazas comunes.
                </p>
                <a href="#" class="btn btn-primary">Leer más</a>
            </div>
        </div>
    </div>

    {{-- Noticia 6 --}}
    <div class="col-md-6">
        <div class="card">
            <img class="card-img-top" src="{{ asset('images/noticia6.jpg') }}" alt="Convenio empresa">
            <div class="card-body">
                <h5 class="card-title">Convenio con Empresas del Sector TIC</h5>
                <p class="card-text">
                    Anunciamos un nuevo convenio con empresas tecnológicas para facilitar prácticas profesionales a nuestros estudiantes destacados.
                </p>
                <a href="#" class="btn btn-primary">Leer más</a>
            </div>
        </div>
    </div>
</div>

    </div>
</div>



@endsection
