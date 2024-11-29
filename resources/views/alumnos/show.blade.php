<!DOCTYPE html>
<html>
<head>
    <title>Alumno Detalle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Alumno Detalle</h1>
    <p><strong>ID:</strong> {{ $alumno->id }}</p>
    <p><strong>Nombre:</strong> {{ $alumno->name }}</p>
    <p><strong>Apellido:</strong> {{ $alumno->lastname }}</p>
    <p><strong>Correo:</strong> {{ $alumno->email }}</p>
    <p><strong>Edad:</strong> {{ $alumno->age }}</p>
    
    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
    
    <a href="{{ route('alumnos.edit', $alumnos->id) }}" class="btn btn-warning">Editar</a>
</body>
</html>