<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('dashboard') }}" class="nav-link">Inicio</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    @php
        $usuario = Session::get('user');
    @endphp

    @if($usuario)
      <!-- Enlace al perfil del usuario -->
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="fas fa-user"></i> {{ $usuario }}
        </a>
      </li>

      <!-- Botón de logout -->
      <li class="nav-item">
        <a href="#" class="nav-link text-danger" title="Cerrar sesión"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>

      <!-- Formulario oculto de logout -->
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    @else
      <!-- Enlace de Login si no hay sesión -->
      <li class="nav-item">
        <a href="{{ route('login') }}" class="nav-link">
          <i class="fas fa-user"></i> Login
        </a>
      </li>
    @endif
  </ul>
</nav>
<!-- /.navbar -->
