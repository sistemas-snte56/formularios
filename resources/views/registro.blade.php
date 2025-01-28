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
</head>

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

<body class="bg-light">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand my-0 mr-md-auto font-weight-normal" href="#">
                <img class="d-block mx-auto mb-4" src="{{ asset('assets/img/logo-snte56.svg') }}" alt=""
                    width="220">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        &nbsp;
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0" method="GET" action="{{ route('buscar') }}">
                    <input class="form-control mr-sm-2" type="text" placeholder="No. de personal" aria-label="Search"
                        name="search" id="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar...</button>
                </form>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="py-5 mb-5 text-center">
            <img class="d-block mx-auto mt-4" src="{{ asset('assets/img/logo-snte56.svg') }}" alt=""
                width="420">
            <h2>FORMULARIO DE REGISTRO</h2>
            <p class="lead">"La Directiva Seccional Sindical de la Sección 56 del SNTE, a través de la Secretaría de Cultura, Recreación y Deporte, con el objetivo de fomentar el deporte y estrechar los lazos de amistad entre los compañeros, convoca a participar en las Jornadas Deportivas Magisteriales 2025."</p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Ingresa la información solicitada.</h4>

                <form action="{{ route('registro.store') }}" method="post" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="tema" value="{{ $tema->id }}">
                    <div class="row">
                    </div>

                    <div class="col-md-4 mb-3">
                    </div>
                    <livewire:region />

                    <hr class="mb-4">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                name="nombre" id="nombre" placeholder="Ingrese su nombre"
                                value="{{ old('nombre') }}" required>
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo nombre es requerido.</strong></li>
                                    @error('nombre')
                                        <li><strong>{{ $message }}</strong></li>
                                    @enderror
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="apellido_paterno">Apellido paterno</label>
                            <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror"
                                name="apellido_paterno" id="apellido_paterno" placeholder="Su primer apellido"
                                value="{{ old('apellido_paterno') }}" required>
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo apellido paterno es requerido.</strong></li>
                                    @error('apellido_paterno')
                                        <li><strong>{{ $message }}</strong></li>
                                    @enderror
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="apellido_materno">Apellido materno</label>
                            <input type="text" class="form-control" name="apellido_materno" id="apellido_materno"
                                placeholder="Su segundo apellido" value="{{ old('apellido_materno') }}">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="select_genero">Genero</label>
                            <select class="custom-select d-block w-100 @error('select_genero') is-invalid @enderror"
                                id="select_genero" name="select_genero" required>
                                <option value="">Selecciona...</option>
                                @foreach ($generos as $id => $item)
                                    <option value="{{ $id }}"
                                        {{ old('select_genero') == $id ? 'selected' : '' }}>{{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo genero es requerido.</strong></li>
                                    @error('select_genero')
                                        <li><strong>{{ $message }}</strong></li>
                                    @enderror
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="rfc">RFC</label>
                            <input type="text" class="form-control @error('rfc') is-invalid @enderror"
                                name="rfc" id="rfc" placeholder="AAAA123245BBB"
                                value="{{ old('rfc') }}" required>
                            <small class="text-muted">El RFC es con homoclave</small>
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo RFC es requerido.</strong></li>
                                    @error('rfc')
                                        <li><strong>{{ $message }}</strong></li>
                                    @enderror
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="numero_de_personal">Número de personal</label>
                            <input type="numeric"
                                class="form-control  @error('numero_de_personal') is-invalid @enderror"
                                name="numero_de_personal" id="numero_de_personal" placeholder="Su número de personal"
                                value="{{ old('numero_de_personal') }}" required>
                            <small class="text-muted">Solo valores numericos</small>
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo numero de personal es requerido.</strong></li>
                                    @error('numero_de_personal')
                                        <li><strong>{{ $message }}</strong></li>
                                    @enderror
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="telefono">Teléfono</label>
                            <input type="numeric" class="form-control @error('telefono') is-invalid @enderror"
                                name="telefono" id="telefono" placeholder="Número telefonico"
                                value="{{ old('telefono') }}" required>
                            <small class="text-muted">Teléfono a 10 dígitos</small>
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo teléfono es requerido.</strong></li>
                                    @error('telefono')
                                        <li><strong>{{ $message }}</strong></li>
                                    @enderror
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="usuario@email.com"
                                value="{{ old('email') }}" required autocomplete="email">
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo email es requerido.</strong></li>
                                    @error('email')
                                        <li><strong>{{ $message }}</strong></li>
                                    @enderror
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="select_nivel_educativo">Nivel educativo</label>
                            <select class="custom-select d-block w-100" id="select_nivel_educativo"
                                name="select_nivel_educativo" required>
                                <option value="">Selecciona...</option>
                                <option value="PREESCOLAR"
                                    {{ old('select_nivel_educativo') == 'PREESCOLAR' ? 'selected' : '' }}>PREESCOLAR
                                </option>
                                <option value="PRIMARIA"
                                    {{ old('select_nivel_educativo') == 'PRIMARIA' ? 'selected' : '' }}>PRIMARIA
                                </option>
                                <option value="EDUCACIÓN ESPECIAL"
                                    {{ old('select_nivel_educativo') == 'EDUCACIÓN ESPECIAL' ? 'selected' : '' }}>
                                    EDUCACIÓN ESPECIAL</option>
                                <option value="SECUNDARIA"
                                    {{ old('select_nivel_educativo') == 'SECUNDARIA' ? 'selected' : '' }}>SECUNDARIA
                                </option>
                                <option value="TELESECUNDARIA"
                                    {{ old('select_nivel_educativo') == 'TELESECUNDARIA' ? 'selected' : '' }}>
                                    TELESECUNDARIA</option>
                                <option value="EDUCACIÓN FÍSICA"
                                    {{ old('select_nivel_educativo') == 'EDUCACIÓN FÍSICA' ? 'selected' : '' }}>
                                    EDUCACIÓN FÍSICA</option>
                                <option value="NIVELES ESPECIALES"
                                    {{ old('select_nivel_educativo') == 'NIVELES ESPECIALES' ? 'selected' : '' }}>
                                    NIVELES ESPECIALES</option>
                                <option value="PAAE"
                                    {{ old('select_nivel_educativo') == 'PAAE' ? 'selected' : '' }}>PAAE</option>
                                <option value="BACHILLERATO"
                                    {{ old('select_nivel_educativo') == 'BACHILLERATO' ? 'selected' : '' }}>
                                    BACHILLERATO</option>
                                <option value="TELEBACHILLERATO"
                                    {{ old('select_nivel_educativo') == 'TELEBACHILLERATO' ? 'selected' : '' }}>
                                    TELEBACHILLERATO</option>
                                <option value="NORMALES"
                                    {{ old('select_nivel_educativo') == 'NORMALES' ? 'selected' : '' }}>NORMALES
                                </option>
                                <option value="UPV" {{ old('select_nivel_educativo') == 'UPV' ? 'selected' : '' }}>
                                    UPV</option>
                                <option value="JUBILADOS"
                                    {{ old('select_nivel_educativo') == 'JUBILADOS' ? 'selected' : '' }}>JUBILADOS
                                </option>
                            </select>
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo nivel educativo es requerido.</strong></li>
                                    @error('select_nivel_educativo')
                                        <li><strong>{{ $message }}</strong></li>
                                    @enderror
                                </ul>
                            </div>
                        </div>

                    </div>




                    <hr class="mb-4">

                    <div class="mb-3">
                        <label for="talon" class="form-label">Talón de pago</label>
                        <input class="form-control" type="file" name="talon" id="talon"
                            accept="application/pdf" required>
                        <small class="text-muted">Su talón de pago debe ser en formato PDF</small>
                        <div class="invalid-feedback">
                            El campo talón es requerido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="ine_frontal" class="form-label">Anverso INE</label>
                        <input class="form-control" type="file" name="ine_frontal" id="ine_frontal"
                            accept="image/*" required>
                        <small class="text-muted">Selecciona la imagen frontal de su credencial</small>
                        <div class="invalid-feedback">
                            El campo anverso ine es requerido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="ine_reverso" class="form-label">Reverso INE</label>
                        <input class="form-control" type="file" name="ine_reverso" id="ine_reverso"
                            accept="image/*" required>
                        <small class="text-muted">Selecciona la imagen reverso de su credencial</small>
                        <div class="invalid-feedback">
                            El campo reverso ine es requerido.
                        </div>
                    </div>






                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Registrar datos</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2025 SNTE | Sección 56 - Todos los Derechos Reservados.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Aviso de Privacidad</a></li>
                <li class="list-inline-item"><a href="#">Soporte</a></li>
            </ul>
        </footer>
    </div>

    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/holder.min.js') }}"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>


    @if (session('success_registro'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('success_registro') }}"
                Swal.fire({
                    icon: 'success',
                    title: mensaje,
                    text: 'El registro se guardo satisfactoriamente.',
                    showConfirmButton: true,
                });
            });
        </script>
    @endif

    @if (session('error_try'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('error_try') }}"
                Swal.fire({
                    icon: 'warning',
                    title: mensaje,
                    text: 'Por favor, inténtalo de nuevo.',
                    showConfirmButton: true,
                });
            });
        </script>
    @endif

    {{-- @if (session('campo_vacio'))
            <script>
                $(document).ready(function(){
                    Swal.fire({
                        title: "Ingresa número de personal",
                        icon: "warning",
                        draggable: true                        
                    });
                });
            </script>
        @endif  --}}

    @if (session('sin_datos'))
        <script>
            $(document).ready(function() {
                let mensaje = " {{ session('sin_datos') }} ";
                Swal.fire({
                    title: mensaje,
                    text: "No hay información con el número de personal que ingreso.",
                    icon: "error",
                    draggable: true,
                    confirmButtonText: 'Cerrar'
                });
            });
        </script>
    @endif

    @if (session('success_search'))
        <script>
            $(document).ready(function() {
                let mensaje = " {{ session('success_search') }} ";
                let npersonal = " {{ session('npersonal') }} ".trim();;



                // Swal.fire({
                //     title: mensaje,
                //     text: "El número personal que ingreso es valido.",
                //     icon: "success",
                //     draggable: true,
                //     confirmButtonText: 'Cerrar',
                //     html: `¿Te gustaría <b> ver </b> el resultado? <br>

        //                 <form action="{{ route('usuario.show') }}" method="get">
        //                     <input type="hidden" name="npersonal" value="${npersonal}">
        //                     <button type="submit" class="btn btn-link">clik aquí</button>
        //                 </form>

        //                 `,
                // });




                Swal.fire({
                    title: mensaje,
                    text: "El número personal que ingreso es valido.",
                    icon: "success",
                    html: `<h5>El número de personal que ingreso esta registrado</h5>¿Te gustaría <b> ver </b> los resultados? <br>`,
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "No",
                    confirmButtonText: "Sí"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Crear el formulario y enviarlo automáticamente
                        const form = document.createElement('form');
                        form.action = "{{ route('usuario.show') }}";
                        form.method = 'get';

                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'npersonal';
                        input.value = npersonal;

                        form.appendChild(input);
                        document.body.appendChild(form);

                        form.submit(); // Enviar el formulario automáticamente
                    }
                });




            });
        </script>
    @endif


    @if (session('success_registro'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success_registro') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session('error_details'))
        <script>
            console.error("Error al cargar el archivo: " + @json(session('error_details')));
        </script>
    @endif


    @if ($errors->any())
        <script>
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += '{{ $error }}\n';
            @endforeach

            Swal.fire({
                title: '¡Error!',
                text: errorMessages,
                icon: 'error',
                draggable: true,
                confirmButtonText: 'Cerrar'
            });
        </script>
    @endif

</body>

</html>
