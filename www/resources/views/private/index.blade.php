

@section('title', 'Bienvenido a AcademiaApp')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Iniciar sesión</h3>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" placeholder="Correo" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <a href="#" class="btn btn-link">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6 text-center">
            <h1 class="display-4 mb-3">¡Bienvenido a <strong>AcademiaApp</strong>!</h1>
            <p class="lead">La mejor plataforma para la gestión académica. Inicia sesión para comenzar a aprender y administrar tus cursos.</p>
        </div>
    </div>
</div>
@endsection
