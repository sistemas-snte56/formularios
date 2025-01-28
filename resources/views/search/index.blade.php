<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">

    <title>SNTE :: Sección 56</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href=" {{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/form-validation.css') }}" rel="stylesheet">
</head>

<meta name="theme-color" content="#563d7c">


<script type="text/javascript"
    src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=HOH1cwZRWqDu_Zdj8tIdy-7kKGHPQjWOaUKHk08kkcB3jnY3Onm31T9dJn_0hQFEuCLH34lbC_gjGHnviOo3owMN2qGsacbMqRlLYjTiFH4"
    charset="UTF-8"></script>
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



</head>

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
                        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>







    <div class="container mt-5">
        <div class="py-5 mb-5 text-center">
            <img class="d-block mx-auto mt-4" src="{{ asset('assets/img/logo-snte56.svg') }}" alt=""
                width="420">
            <h2>FORMULARIO DE REGISTRO</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form
                group has a validation state that can be triggered by attempting to submit the form without completing
                it.</p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Ingresa la información solicitada.</h4>
                <form class="needs-validation" novalidate>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <livewire:region />
                        </div>
                    </div>

                    <hr class="mb-4">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre " id="nombre" placeholder="Ingresa tu nombre" value="{{old('nombre')}}" required>
                            <div class="invalid-feedback">
                                El campo nombre es requerido.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="apellido_paterno">Apellido paterno</label>
                            <input type="text" class="form-control" name="apellido_paterno " placeholder="Primer apellido" value="{{old('apellido_paterno')}}" required>
                            <div class="invalid-feedback">
                                El campo apellido paterno es requerido.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="apellido_materno">Apellido materno</label>
                            <input type="text" class="form-control" name="apellido_materno " id="apellido_materno" placeholder="Segundo apellido" value="{{old('apellido_materno')}}">
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="select_genero">Genero</label>
                            <select class="custom-select d-block w-100" id="select_genero" name="select_genero" required>
                                <option value="">Selecciona...</option>
                                <option>Hombre</option>
                                <option>Mujer</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecciona un genero.
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="rfc">RFC</label>
                            <input type="text" class="form-control" name="rfc " id="rfc" placeholder="Tú RFC con homoclave" value="{{old('rfc')}}"
                                required>

                            <small class="text-muted">El RFC es con homoclave</small>                              
                            <div class="invalid-feedback">
                                El campo RFC es requerido.
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="numero_de_personal">No de personal</label>
                            <input type="text" class="form-control" name="numero_de_personal " id="numero_de_personal" placeholder="¿Cúal es tú número de personal?" value="{{old('numero_de_personal')}}"
                                required>
                            <small class="text-muted">Solo valores numericos</small>
                            <div class="invalid-feedback">
                                El campo número personal es requerido.
                            </div>
                        </div>                        

                        <div class="col-md-3 mb-3">
                            <label for="apellido_paterno">Telefono</label>
                            <input type="text" class="form-control" name="apellido_paterno " id="apellido_paterno" placeholder="Primer apellido" value="{{old('apellido_paterno')}}"
                                required>
                            <div class="invalid-feedback">
                                El campo apellido paterno es requerido.
                            </div>
                        </div>                        

                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">Correo electrónico</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="usuario@email.com" value="{{old('email')}}"
                                required>
                            <div class="invalid-feedback">
                                El campo apellido paterno es requerido.
                            </div>
                        </div>                         
                        <div class="col-md-6 mb-3">
                            <label for="select_genero">Nivel educativo</label>
                            <select class="custom-select d-block w-100" id="country" required>
                                <option value="">Selecciona...</option>
                                <option value="PREESCOLAR">PREESCOLAR</option>
                                <option value="PRIMARIA">PRIMARIA</option>
                                <option value="EDUCACIÓN ESPECIAL">EDUCACIÓN ESPECIAL</option>
                                <option value="SECUNDARIA">SECUNDARIA</option>
                                <option value="TELESECUNDARIA">TELESECUNDARIA</option>
                                <option value="EDUCACIÓN FÍSICA">EDUCACIÓN FÍSICA</option>
                                <option value="NIVELES ESPECIALES">NIVELES ESPECIALES</option>
                                <option value="PAAE">PAAE</option>
                                <option value="BACHILLERATO">BACHILLERATO</option>
                                <option value="TELEBACHILLERATO">TELEBACHILLERATO</option>
                                <option value="NORMALES">NORMALES</option>
                                <option value="UPV">UPV</option>
                                <option value="JUBILADOS">JUBILADOS</option>                                
                            </select>
                            <div class="invalid-feedback">
                                Selecciona un genero.
                            </div>
                        </div>

                    </div>




                    <hr class="mb-4">

                    <div class="mb-3">
                        <label for="talon" class="form-label">Talón de pago</label>
                        <input class="form-control" type="file" name="talon" id="talon" accept="application/pdf" required>
                        <small class="text-muted">Su talón de pago debe ser en formato PDF</small>
                        <div class="invalid-feedback">
                            El campo talón es requerido.
                        </div>                        
                    </div>

                    <div class="mb-3">
                        <label for="ine_frontal" class="form-label">Anverso INE</label>
                        <input class="form-control" type="file" name="ine_frontal" id="ine_frontal" accept="image/*" required>
                        <small class="text-muted">Selecciona la imagen frontal de su credencial</small>
                        <div class="invalid-feedback">
                            El campo anverso ine es requerido.
                        </div>                        
                    </div>

                    <div class="mb-3">
                        <label for="ine_reverso" class="form-label">Reverso INE</label>
                        <input class="form-control" type="file" name="ine_reverso" id="ine_reverso" accept="image/*" required>
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
</body>


</html>
