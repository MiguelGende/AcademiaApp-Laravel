@extends('private.template.base')

@section('title', 'Alunmos')

@section('content')


@section('content')
<div class="container-fluid">
<h1>Alumnos Inscritos</h1>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Listado de 25 Alumnos Registrados</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre completo</th>
                        <th>Email</th>
                        <th>Curso inscrito</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(range(1, 25) as $i)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>Alumno {{ $i }} Pérez</td>
                        <td>alumno{{ $i }}@novatech.edu</td>
                        <td>
                            @php
                                $cursos = ['Laravel', 'Angular', 'HTML/CSS', 'Ciberseguridad', 'Bases de Datos'];
                                $curso = $cursos[array_rand($cursos)];
                            @endphp
                            {{ $curso }}
                        </td>
                        <td>
                            <span class="badge badge-success">Activo</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection