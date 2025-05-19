@extends('private.template.base')

@section('title', 'Crear Categorías')

@section('content')
<div class="container">
    <h1>Crear Nueva Categoría</h1>

    {{-- Mensajes de error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario de creación --}}
    <form action="{{ route('categories.store') }}" method="POST" class="mb-4">
        @csrf

        <div class="form-group">
            <label for="name">Nombre de la Categoría</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    {{-- Tabla de categorías --}}
    <h2>Listado de Categorías</h2>
    @if ($categories->isEmpty())
        <p>No hay categorías registradas.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categoria)
                    <tr>
                        <td>{{ $categoria->name }}</td>
                        <td>
                            {{-- Editar --}}
                            <a href="{{ route('categories.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            {{-- Eliminar --}}
                            <form action="{{ route('categories.destroy', $categoria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
