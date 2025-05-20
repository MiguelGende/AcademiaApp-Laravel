<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Panel de Administración')</title>

  <!-- FullCalendar CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fullcalendar/main.min.css') }}">

  <!-- CSS de AdminLTE -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- CSS personalizado -->
  <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
  <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">


  <style>
    #calendar {
      min-height: 500px;
      padding: 10px;
      background: #fff;
      border-radius: 8px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('private.template.navbar')
  @include('private.template.sidebar')

  <div class="content-wrapper">
    @yield('content')
  </div>

  @include('private.template.footer')

</div>

<!-- jQuery -->
<script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- FullCalendar JS -->
<script src="{{ asset('vendor/adminlte/plugins/fullcalendar/main.min.js') }}"></script>

<!-- AdminLTE JS -->
<script src="{{ asset('vendor/adminlte/js/adminlte.min.js') }}"></script>

@stack('scripts')

</body>
</html>
