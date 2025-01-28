<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#563d7c">
    <title>Sección 56 :: SNTE</title>
    <link rel="icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap core CSS -->
    <link href=" {{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/form-validation.css') }}" rel="stylesheet">
    <style>
        /* Estilos adicionales para centrar el contenido */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ocupa todo el alto de la pantalla */
            margin: 0;
            background-color: #f8f9fa; /* Color de fondo (opcional) */
        }

        .contenido {
            width: 100%;
            max-width: 900px; /* Ancho máximo del formulario */
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave para el formulario */
        }

        h5 {
            text-align: center;
        }
    </style>
</head>
{{$usuario->nombre}}
<body class="text-center">
    <div class="contenido">
        <img class="d-block mx-auto mt-4" src="{{ asset('assets/img/logo-snte56.svg') }}" alt="" width="420">
        <h1 class="h3 mb-5 font-weight-normal">Resultados</h1>    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/holder.min.js') }}"></script>
</body>

</html>
