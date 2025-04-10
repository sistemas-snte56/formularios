<!-- resources/views/components/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Iniciar Sesión')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-bg {
            background-color: #ee7a00;
            /* Un color personalizado */
        }
        
        body {
            background-image: url('{{ asset("assets/img/greca.png") }}');
            background-repeat: repeat;
            background-position: top left;
            background-size: auto;
        }        
    </style>
    @livewireStyles
</head>

<body class="d-flex flex-column min-vh-100">


    <div class="container">
        <div class="jumbotron mt-3">
            <picture>
                <source srcset="{{asset('assets/img/banner-carrusel-100.jpg')}}" media="(min-width: 300px)" />
                <img src="{{asset('assets/img/banner-carrusel-100.jpg')}}" class="img-fluid " alt="...">
            </picture>
        </div>
    </div>



    <!-- Contenedor principal para el contenido -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="custom-bg text-white text-center py-3 mt-5">
        <p>&copy; {{ date('Y') }} Sección 56 del SNTE. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS y Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    @livewireScripts


</body>

</html>