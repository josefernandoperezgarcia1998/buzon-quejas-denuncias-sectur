<!-- create.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzón de contacto</title>

    {{-- CSS para select2 --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}

    {{-- CDN Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    {{-- inicio select2 --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        #wrong-egn {
            display: none;
            font-size: 12px;
            color: red;
        }

        #wrong-egn1 {
            display: none;
            font-size: 12px;
            color: red;
        }

        #wrong-egn2 {
            display: none;
            font-size: 12px;
            color: red;
        }

        #wrong-egn3 {
            display: none;
            font-size: 12px;
            color: red;
        }
    </style>

</head>

<body>
    <!-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<div class="d-flex">
    <div class="">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><img src="{{asset('assets/img/logo_sectur.png')}}" alt="logo_sectur" width="140" height="63"></a>
    </div>
    <div style="display:block;">
        <ul class="nav nav_header p-4">
            <li class="text-white nav-item effect-hover">
                <a href="http://www.turismochiapas.gob.mx/institucional/index.php" style="color:white; text-decoration: none;">Institucional</a>
            </li>
        </ul>
    </div>
</div>
</header> -->
    {{-- <div class="container"> --}}
    <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
    <div class="">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡MENSAJE ENVIADO!{{ session('success') }}</strong>
            <p>Gracias por haber enviado tu denuncia ó queja al buzón de la Secretaría de Turismo del Estado de
                Chiapas.<br>En breve te llegará un mensaje al correo electrónico, revisa tu carpeta de
                <strong>SPAM</strong> ó <strong>CORREOS NO DESEADOS</strong>.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">La Secretaría de Turismo del Estado de Chiapas te informa</h4>
            <p class="fw-light" style="font-size: 14px;">Los miembros del Comité de Ética y Prevención de Conflictos de
                Interés de la Secretaría de Turismo,
                han aprobado el “Protocolo de atención de Quejas y Denuncias por presuntos incumplimientos a los
                Códigos de Honestidad y Ética de los Servidores Públicos de la Administración Pública el Estado de
                Chiapas,
                al Código de Conducta de la Secretaría de Turismo”; derivado del Protocolo, y con el objetivo de brindar
                las herramientas necesarias a las personas servidoras públicas para la presentación de quejas o
                denuncias,
                se ha implementado el presente formulario el cual debe ser llenado correctamente. En seguimiento a su
                denuncia, personal del Comité se pondrá en contacto con usted.</p>
        </div>
        <div class="card-header">
            <p><strong>Todos los campos son obligatorios.</strong></p>
        </div>
        <div class="card-body">
            <form id="formulario" action="{{ route('emails.send') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate autocomplete="off">
                <div class="">
                    <h4 class="text-center">Datos de la persona que presenta la denuncia</h4>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" id="nombre"
                                    name="nombre" value="{{ old('nombre') }}" autocomplete="off" required>
                                <div id="wrong-egn2">Solo letras, espacio y acentos.</div>
                                    @if ($errors->has('nombre'))
                                        <div class="text-danger">{{ $errors->first('nombre') }}</div>
                                    @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefono"
                                name="telefono" value="{{ old('telefono') }}" autocomplete="off" required onkeyup="myFunction()">
                                <small><strong>Formato a diez digitos: 9611692142</strong></small>
                                <div id="wrong-egn">Por favor introduce bien el formato.</div>
                                @if ($errors->has('telefono'))
                                    <div class="text-danger">{{ $errors->first('telefono') }}</div>
                                @endif
                        </div>
                        <div class="col-sm">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email"
                                name="email" value="{{ old('email') }}" autocomplete="off" required>
                                @if ($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="area" class="form-label">Área de adscripción</label>
                                <select class="form-select" name="area_id" value="{{ old('area_id') }}" required>
                                    <option value="" selected>Seleccionar área</option>
                                    @foreach ($areas as $area)
                                        <option value="{{$area->id}}">{{$area->nombre}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('area_id'))
                                    <div class="text-danger">{{ $errors->first('area_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <label for="cargo_puesto" class="form-label">Cargo ó Puesto</label>
                            <input type="text" class="form-control" id="cargo_puesto"
                                name="cargo_puesto" value="{{ old('cargo_puesto') }}" autocomplete="off" required>
                                @if ($errors->has('cargo_puesto'))
                                    <div class="text-danger">{{ $errors->first('cargo_puesto') }}</div>
                                @endif
                        </div>
                        <div class="col-sm">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="datetime" class="form-control" id="fecha" name="fecha" autocomplete="off"
                                value="<?php echo date("d-m-Y");?>" readonly>
                                <small><strong>Día/Mes/Año</strong></small>
                        </div>
                    </div>
                    <br><br>
                    <h4 class="text-center">Datos del servidor(a) público(a) contra quién se presenta la denuncia</h4>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="nombre_servidor_denuncia" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_servidor_denuncia"
                                    name="nombre_servidor_denuncia" value="{{ old('nombre_servidor_denuncia') }}" autocomplete="off" required>
                                    @if ($errors->has('nombre_servidor_denuncia'))
                                        <div class="text-danger">{{ $errors->first('nombre_servidor_denuncia') }}</div>
                                    @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <label for="area_servidor_denuncia" class="form-label">Área de Adscripción</label>
                            <select class="form-select" name="area_denunciado_id" value="{{ old('area_denunciado_id') }}" required>
                                <option value="" selected>Seleccionar área</option>
                                @foreach ($areas as $area)
                                    <option value="{{$area->id}}">{{$area->nombre}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('area_denunciado_id'))
                                <div class="text-danger">{{ $errors->first('area_denunciado_id') }}</div>
                            @endif
                        </div>
                        <div class="col-sm">
                            <label for="cargo_puesto_servidor_denuncia" class="form-label">Cargo ó Puesto</label>
                            <input type="text" class="form-control" id="cargo_puesto_servidor_denuncia"
                                name="cargo_puesto_servidor_denuncia" value="{{ old('cargo_puesto_servidor_denuncia') }}"
                                autocomplete="off" required>
                                @if ($errors->has('cargo_puesto_servidor_denuncia'))
                                    <div class="text-danger">{{ $errors->first('cargo_puesto_servidor_denuncia') }}</div>
                                @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="mensaje_breve" class="form-label">
                                    Narración muy breve y clara de los hechos, especificando circunstancias de
                                    <strong>modo</strong>, <strong>tiempo</strong>, <strong>lugar</strong> y
                                    <strong>personas involucradas</strong>, señalando medios probatorios de la
                                    conducta, ó en caso de que sesa <strong>anónima</strong>, indicar los medios
                                    probatorios de un tercero.
                                </label>
                                <textarea class="form-control" id="mensaje_breve_servidor_denuncia"
                                    name="mensaje_breve_servidor_denuncia" rows="3" required></textarea>
                                    @if ($errors->has('mensaje_breve_servidor_denuncia'))
                                        <div class="text-danger">{{ $errors->first('mensaje_breve_servidor_denuncia') }}</div>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3 w-50">
                                <label for="fecha_servidor_denuncia" class="form-label">Fecha del evento</label>
                                <input type="date" class="form-control" id="fecha_servidor_denuncia"
                                    name="fecha_servidor_denuncia" value="{{ old('fecha_servidor_denuncia') }}" autocomplete="off" required>
                                    @if ($errors->has('fecha_servidor_denuncia'))
                                        <div class="text-danger">{{ $errors->first('fecha_servidor_denuncia') }}</div>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <h4 class="text-center">Datos de la persona que haya sido testigo de los hechos</h4>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="nombre_testigo" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_testigo"
                                    name="nombre_testigo" value="{{ old('nombre_testigo') }}" autocomplete="off" required>
                                    @if ($errors->has('nombre_testigo'))
                                        <div class="text-danger">{{ $errors->first('nombre_testigo') }}</div>
                                    @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <label for="domicilio_testigo" class="form-label">Domicilio</label>
                            <input type="text" class="form-control" id="domicilio_testigo"
                                name="domicilio_testigo" value="{{ old('domicilio_testigo') }}" autocomplete="off" required>
                                @if ($errors->has('domicilio_testigo'))
                                    <div class="text-danger">{{ $errors->first('domicilio_testigo') }}</div>
                                @endif
                        </div>
                        <div class="col-sm">
                            <label for="telefono_testigo" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefono_testigo"
                                name="telefono_testigo" value="{{ old('telefono_testigo') }}" autocomplete="off" required onkeyup="myFunction2()">
                                <small><strong>Formato a diez digitos: 9611642143</strong></small>
                                <div id="wrong-egn1">Por favor introduce bien el formato.</div>
                                @if ($errors->has('telefono_testigo'))
                                    <div class="text-danger">{{ $errors->first('telefono_testigo') }}</div>
                                @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="email_testigo" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email_testigo"
                                    name="email_testigo" value="{{ old('email_testigo') }}" autocomplete="off" required>
                                    @if ($errors->has('email_testigo'))
                                        <div class="text-danger">{{ $errors->first('email_testigo') }}</div>
                                    @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <label for="trabajo_testigo" class="form-label">¿Trabaja en la administración
                                pública estatal?</label>
                            <select class="form-select" name="trabajo_admon_publica" id="trabajo_admon_publica" value="{{ old('trabajo_admon_publica') }}" required>
                                <option value="" selected>Seleccionar</option>
                                <option {{ old('trabajo_admon_publica') == 'Si' ? 'selected' : '' }} value="Si" id="flexRadioDefaultSi">
                                    Si</option>
                                <option {{ old('trabajo_admon_publica') == 'No' ? 'selected' : '' }} value="No" id="flexRadioDefaultNo">
                                    No</option>
                            </select>
                            @if ($errors->has('trabajo_admon_publica'))
                                <div class="text-danger">{{ $errors->first('trabajo_admon_publica') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="entidad_dependencia_testigo" class="form-label">Entidad ó
                                    Dependencia</label>
                                    
                                <input type="text" class="form-control" id="entidad_dependencia_testigo"
                                    name="entidad_dependencia_testigo" value="{{ old('entidad_dependencia_testigo') }}" autocomplete="off" required>
                                    @if ($errors->has('entidad_dependencia_testigo'))
                                        <div class="text-danger">{{ $errors->first('entidad_dependencia_testigo') }}</div>
                                    @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <label for="cargo_testigo" class="form-label">Cargo ó Puesto</label>
                            <input type="text" class="form-control" id="cargo_testigo"
                                name="cargo_testigo" value="{{ old('cargo_testigo') }}" autocomplete="off" required>
                                @if ($errors->has('cargo_testigo'))
                                    <div class="text-danger">{{ $errors->first('cargo_testigo') }}</div>
                                @endif 
                        </div>
                    </div>
                </div>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="aviso_privacidad" required>
                <label class="form-check-label" for="aviso_privacidad">
                    Acepto <a href="http://www.turismochiapas.gob.mx/institucional/aviso/formatos/Oficina-secretaria-integral.pdf" target="_blank">aviso de privacidad</a>.
                </label>
                <div id="wrong-egn3">SELECCIONA LA CASILLA PARA CONTINUAR.</div>
                <br><br>
                <button type="submit" class="btn btn-primary">Enviar</button>
                    <br><br>
                    <small>La denuncia o queja enviada, puede llegar a la carpeta de <strong>SPAM</strong> ó <strong>CORREOS NO DESEADOS</strong> de su cuenta de correo, favor de revisarla.</small>
                
            </form>
        </div>
    </div>
    {{-- </div> --}} {{-- Aqui termina el container --}}
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    {{-- Script for visualize the extra content of the form --}}
    <!-- <script>
    $("#trabajo_admon_publica").change(function(){
        var estado = $("#trabajo_admon_publica").val();
        if ( estado == 'Si') {
            document.getElementById("si_testigo_div").style.display = "block";
        }else if ( estado == 'No' ){
            document.getElementById("si_testigo_div").style.display = "none";
        } else {
            document.getElementById("si_testigo_div").style.display = "none";
        }
    });
</script> -->


    <!-- Script para que se valide el formulario con bootstrap si los campos están vacíos ó no -->
    <!-- Example starter JavaScript for disabling form submissions if there are invalid fields -->
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

    <!-- Script para validar que los campos de telefono sean a 10 digitos -->
    <script>
        function myFunction() {
            $('#telefono').keyup(function (e) {
                if ($(this).val().length === 10) {
                    e.preventDefault();
                    $('#wrong-egn').slideUp();
                } else {
                    $('#wrong-egn').slideDown();
                }
            });
        }

        function myFunction2() {
            $('#telefono_testigo').keyup(function (e) {
                if ($(this).val().length === 10) {
                    e.preventDefault();
                    $('#wrong-egn1').slideUp();
                } else {
                    $('#wrong-egn1').slideDown();
                }
            });
        }
    </script>


    <!-- 
    Para validar con el select 
    Si la opción es "si"    
-->
    <script>
        $("#trabajo_admon_publica").change(function () {
            var estado = $("#trabajo_admon_publica").val();
            if (estado == 'Si') {
                $("#entidad_dependencia_testigo").prop("readonly", false);
                $("#cargo_testigo").prop("readonly", false);

                // Agregando required en caso de ser seleccionado si
                $("#entidad_dependencia_testigo").prop("required", true);
                $("#cargo_testigo").prop("required", true);
            } else if (estado == '') {
                $("#entidad_dependencia_testigo").prop("readonly", true);
                $("#cargo_testigo").prop("readonly", true);

                // Quitando required en caso de ser seleccionado no
                $("#entidad_dependencia_testigo").prop("required", false);
                $("#cargo_testigo").prop("required", false);
            } else if (estado == 'No') {
                $("#entidad_dependencia_testigo").prop("readonly", true);
                $("#cargo_testigo").prop("readonly", true);

                // Quitando required en caso de ser seleccionado no
                $("#entidad_dependencia_testigo").prop("required", false);
                $("#cargo_testigo").prop("required", false);
            } else {
                $("#entidad_dependencia_testigo").prop("readonly", false);
                $("#cargo_testigo").prop("readonly", false);

                // Quitando required en caso de ser seleccionado no
                $("#entidad_dependencia_testigo").prop("required", false);
                $("#cargo_testigo").prop("required", false);
            }
        });
    </script>

 <!-- Comprobar cuando cambia un checkbox -->
    <script>
    $('#aviso_privacidad').on('change', function() {
        if ($(this).is(':checked') ) {
            $('#wrong-egn3').slideUp();
        } else {
            // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Deseleccionado");
            $('#wrong-egn3').slideDown();
        }
    });
    </script>

</body>

</html>