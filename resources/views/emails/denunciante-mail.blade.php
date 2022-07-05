<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buzón Denuncia</title>
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" style="background-color:black;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="http://www.turismochiapas.gob.mx/institucional/index.php"><img src="{{asset('assets/img/logo_sectur.png')}}" alt="logo_sectur" width="140" height="63"></a>
</header>
    <div class="card">
        <div class="card-body">
            <p>Estimado(a) <strong>{{$data->nombre}}</strong>. <br><br>Los miembros del Comité de Ética y Prevención de Conflictos de Interés de la Secretaría de Turismo, 
                han aprobado el “Protocolo de atención de Quejas y Denuncias por presuntos incumplimientos a los 
                Códigos de Honestidad y Ética de los Servidores Públicos de la Administración Pública el Estado de Chiapas, 
                al Código de Conducta de la Secretaría de Turismo”; Derivado del Protocolo, y con el objetivo de brindar 
                las herramientas necesarias a las personas servidoras públicas para la presentación de quejas o denuncias.
                Con base a lo anterior, <strong>tu denuncia ó queja ha sido registrado</strong> en el buzón de la Secretaría de Turismo. 
            </p>
            <p>Un servidor público se contactará contigo por los medios de información que proporcionaste al llenado del formulario.</p>
        </div>
    </div>
    <hr>
    <footer>
        <div class="list-group">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1"><strong>Secretaría de Turismo - Contacto</strong></h5>
            </div>
            <small class="mb-1">Ubicación: Torre Chiapas Nivel 5. </small><br>
            <small class="mb-1">Ciudad: Tuxtla Gutiérrez, CP 29045. </small><br>
            <small class="mb-1">Teléfono: +52 (961) 6170550 </small><br>
            <small class="mb-1">Email: </small>
        </div>
    </footer>
</body>
</html>