<style>
  /* Ajuste cuando el sidebar está contraído */
  body.sidebar-collapse .content-wrapper.custom-full-width {
      margin-left: 0 !important;
      width: 100% !important;
      overflow-x: hidden !important;
  }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <span class="brand-text font-weight-light">Academia APP</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Usuario -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Usuario
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Perfil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cursos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Notificaciones</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Campus Virtual -->
        <li class="nav-header">CAMPUS VIRTUAL</li>

        <!-- Calendario -->
        <li class="nav-item">
          <a href="{{ route('calendario') }}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Calendario
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>

        <!-- Noticias -->
        <li class="nav-item has-treeview {{ request()->is('noticias*') || request()->is('categories*') || request()->is('sliders*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('noticias*') || request()->is('categories*') || request()->is('sliders*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Noticias
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('noticias') }}" class="nav-link {{ request()->routeIs('noticias.index') ? 'active' : '' }}">
                <i class="far fa-list-alt nav-icon"></i>
                <p>Listado de Noticias</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('noticias.create') }}" class="nav-link {{ request()->routeIs('noticias.create') ? 'active' : '' }}">
                <i class="far fa-plus-square nav-icon"></i>
                <p>Crear Noticia</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('categories.create') }}" class="nav-link {{ request()->routeIs('categories.create') ? 'active' : '' }}">
                <i class="fas fa-tags nav-icon"></i>
                <p>Crear Categoría</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sliders.index') }}" class="nav-link {{ request()->routeIs('sliders.index') ? 'active' : '' }}">
                <i class="fas fa-sliders-h nav-icon"></i>
                <p>Sliders</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Contáctanos -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Contáctanos
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('secretaria') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Secretaría Online</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profesorado</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tutorías</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Cursos -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Cursos
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laravel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CSS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bases de Datos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Angular</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>PHP</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ciberseguridad</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>

  <!-- Formulario oculto para logout -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</aside>
