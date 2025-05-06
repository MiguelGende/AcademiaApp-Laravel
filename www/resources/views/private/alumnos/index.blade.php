@extends('private.template.base')

@section('title', 'Alumnos')

@section('content')
<div class="container-fluid">
    <h1>Alumnos Inscritos</h1>
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title">Listado de Alumnos Registrados</h3>
            <button id="addAlumno" class="btn btn-light text-primary">+ Añadir Alumno</button>
        </div>
        <div class="card-body table-responsive p-0">
            <table id="tablaAlumnos" class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre completo</th>
                        <th>Email</th>
                        <th>Curso inscrito</th>
                        <th>Rol</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Las filas se llenarán dinámicamente con JS --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabla = document.querySelector('#tablaAlumnos tbody');
    const btnAdd = document.getElementById('addAlumno');

    // Cargar datos desde localStorage
    let alumnos = JSON.parse(localStorage.getItem('alumnos')) || [];

    function renderTabla() {
        tabla.innerHTML = '';
        alumnos.forEach((alumno, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="id">${index + 1}</td>
                <td contenteditable="true">${alumno.nombre}</td>
                <td contenteditable="true">${alumno.email}</td>
                <td contenteditable="true">${alumno.curso}</td>
                <td>
                    <select class="form-control role-select">
                        <option ${alumno.rol === 'Alumno' ? 'selected' : ''}>Alumno</option>
                        <option ${alumno.rol === 'Profesor' ? 'selected' : ''}>Profesor</option>
                        <option ${alumno.rol === 'Administrador' ? 'selected' : ''}>Administrador</option>
                    </select>
                </td>
                <td>
                    <input type="checkbox" class="activo-checkbox" ${alumno.activo ? 'checked' : ''}>
                </td>
                <td>
                    <button class="btn btn-success btn-sm save-btn">Guardar</button>
                    <button class="btn btn-danger btn-sm delete-btn">Eliminar</button>
                </td>
            `;
            tabla.appendChild(row);
        });
    }

    function guardarEnLocalStorage() {
        localStorage.setItem('alumnos', JSON.stringify(alumnos));
    }

    btnAdd.addEventListener('click', () => {
        alumnos.push({
            nombre: 'Nombre Apellido',
            email: 'email@ejemplo.com',
            curso: 'Curso',
            rol: 'Alumno',
            activo: true
        });
        guardarEnLocalStorage();
        renderTabla();
    });

    tabla.addEventListener('click', (e) => {
        const row = e.target.closest('tr');
        const index = row.rowIndex - 1; // restamos el encabezado

        if (e.target.classList.contains('save-btn')) {
            alumnos[index] = {
                nombre: row.cells[1].innerText,
                email: row.cells[2].innerText,
                curso: row.cells[3].innerText,
                rol: row.querySelector('.role-select').value,
                activo: row.querySelector('.activo-checkbox').checked
            };
            guardarEnLocalStorage();
            alert('Cambios guardados (persistencia local)');
        }

        if (e.target.classList.contains('delete-btn')) {
            if (confirm('¿Eliminar este alumno?')) {
                alumnos.splice(index, 1);
                guardarEnLocalStorage();
                renderTabla();
            }
        }
    });

    renderTabla();
});
</script>
@endsection
