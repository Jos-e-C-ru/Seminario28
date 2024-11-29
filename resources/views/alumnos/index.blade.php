<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 40px;
        }
        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .alert {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="container mt-5">
    <h1>Lista de Alumnos</h1>

    <!-- Alert for Success Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to Add New Item -->
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('alumnos.create') }}" class="btn btn-custom">Agregar Nuevo Alumno</a>
    </div>

    <div class="table-container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de Registro</th>
                    <th>Fecha de Actualización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id }}</td>
                        <td>{{ $alumno->nombre }}</td> <!-- Asegúrate de que el campo sea "nombre" -->
                        <td>{{ $alumno->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $alumno->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('alumnos.show', $alumnos->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('alumnos.edit', $alumnos->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('alumnos.destroy', $alumnos->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este elemento?');">
                                @csrf <!-- Token CSRF para seguridad -->
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
