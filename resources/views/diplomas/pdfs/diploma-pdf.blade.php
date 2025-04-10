<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $participante->slug }}</title>  <!-- Título con el slug del participante -->
    @php
        $path = public_path('assets/img/Recurso1@4x-100.jpg');

        // Convertimos la imagen en base64
        $imageData = base64_encode(file_get_contents($path));

        // Agregar pefijo para el tipo de imagen
        $src = 'data:image/jpg;base64,'.$imageData;
    @endphp    
    <style>
        /* Establecer la imagen de fondo */
        @page{
                /* margin: 0.2cm; */
                margin: 0.2cm;
                padding: 0.2cm;
                text-indent: 0; 
                size: landscape;    
           
            }    

        body {
            background-image: url('{{$src}}'); /* Ruta a la imagen de fondo */
            background-repeat: no-repeat;
            background-size: cover; /* Para que la imagen cubra toda la página  */
            background-position: center center; /*  Centrar la imagen */
            width: 100%;
            height: 100%;
            /* margin: 0;
            padding: 0; */

            
            
            font-family: 'Thoma', sans-serif; /* Fuente Thoma */
            color: #af272f; /* Color de texto #af272f */
            font-size: 20pt; /* Tamaño de fuente 20pt */
            margin: 0;
            padding: 0;
            text-align: center; /* Centrar el texto */
        }

        /* Estilo para el título */
        h1 {
            margin-top: 40%;
            margin-left: 20%;
            font-size: 25pt;
        }

    </style>
</head>
<body>

    <!-- Mostrar el nombre del participante -->
    <h1>{{ $participante->nombre }} {{ $participante->apaterno }} {{ $participante->amaterno }} </h1>

</body>
</html>
