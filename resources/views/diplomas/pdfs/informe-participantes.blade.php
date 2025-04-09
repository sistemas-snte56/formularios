<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>{{ $titulo }}</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participantes as $participante)
                <tr>
                    <td>{{ $participante->nombre }}</td>
                    <td>{{ $participante->email }}</td>
                    <td>{{ $participante->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
