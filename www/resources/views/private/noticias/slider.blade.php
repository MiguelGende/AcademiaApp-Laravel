@extends('private.template.base')

@section('title', 'Slider')

@section('content')

<style>
    .content-wrapper.custom-full-width {
        width: 100%;
        margin-left: 0 !important;
        padding: 1rem;
        box-sizing: border-box;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .form-container {
        max-width: 700px;
        margin: 0 auto; /* Centrado horizontal */
        background: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .form-container h1 {
        margin-bottom: 1rem;
    }

    .form-container .btn {
        margin-top: 1rem;
    }
</style>


<form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image">Imagen</label>
        <input type="file" name="image" class="form-control-file" required>
    </div>

    <button type="submit" class="btn btn-primary">Subir</button>
</form>


@endsection