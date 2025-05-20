@extends('private.template.base')

@section('title', 'Sliders')

@section('content')
<div class="container">
    <h2>Gestión de Sliders</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulario --}}
    <form action="{{ route('sliders.create') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="form-group">
            <label for="tituloSlider">Título</label>
            <input type="text" name="tituloSlider" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcionSlider">Descripción</label>
            <input type="text" name="descripcionSlider" class="form-control">
        </div>

        <div class="form-group">
            <label for="imagenSlider">Imagen</label>
            <input type="file" name="imagenSlider" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="linkSlider">Enlace</label>
            <input type="url" name="linkSlider" class="form-control">
        </div>

        <div class="form-group">
            <label for="ordenSlider">Orden</label>
            <input type="number" name="ordenSlider" class="form-control" min="0">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="estadoSlider" value="1" class="form-check-input" checked>
            <label class="form-check-label" for="estadoSlider">Activo</label>
        </div>

        <button type="submit" class="btn btn-primary">Crear Slider</button>
    </form>

    {{-- Tabla de sliders --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Orden</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
                <tr id="slider-{{ $slider->id }}">
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->description }}</td>
                    <td>
                        @if($slider->image_path)
                            <img src="{{ asset('storage/' . $slider->image_path) }}" alt="Imagen" width="80">
                        @else
                            <span class="text-muted">Sin imagen</span>
                        @endif
                    </td>
                    <td>{{ $slider->order }}</td>
                    <td>
                        <button class="btn toggle-status btn-sm {{ $slider->is_active ? 'btn-success' : 'btn-secondary' }}" 
                                data-id="{{ $slider->id }}">
                            {{ $slider->is_active ? 'Activo' : 'Inactivo' }}
                        </button>
                    </td>
                    <td>
                        {{-- Aquí podrías colocar botones de editar/eliminar en el futuro --}}
                        <button class="btn btn-danger btn-sm" disabled>Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll('.toggle-status').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const btn = this;

                fetch(`/private/sliders/${id}/toggle`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        btn.classList.toggle('btn-success', data.new_status);
                        btn.classList.toggle('btn-secondary', !data.new_status);
                        btn.textContent = data.new_status ? 'Activo' : 'Inactivo';
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
@endsection