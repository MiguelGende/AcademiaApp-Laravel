@extends('private.template.base')

@section('title', 'Secretaría - Contacto')

@section('content_header')
    <h1>Contacto Secretaría</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de contacto</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input type="text" id="inputName" class="form-control" placeholder="Ingrese su nombre">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Correo electrónico</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Ingrese su correo">
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Asunto</label>
                        <input type="text" id="inputSubject" class="form-control" placeholder="Ingrese el asunto">
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Mensaje</label>
                        <textarea id="inputMessage" class="form-control" rows="5" placeholder="Escriba su mensaje aquí..."></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-4">
        <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Correo</span>
                <span class="info-box-number">secretaria@academia.com</span>
            </div>
        </div>

        <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="fas fa-phone"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Teléfono</span>
                <span class="info-box-number">+34 123 456 789</span>
            </div>
        </div>

        <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-map-marker-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Dirección</span>
                <span class="info-box-number">Calle Ejemplo, 123, Ciudad</span>
            </div>
        </div>
    </div>
</div>
@endsection
