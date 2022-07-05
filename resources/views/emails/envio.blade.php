<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buzón Denuncia</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <h4>DATOS DEL DENUNCIANTE</h4>
        <p>Folio Interno SecTur: {{$data->folio}}</p>
        <p>Nombre: {{$data->nombre}}</p>
        <p>Teléfono: {{$data->telefono}}</p>
        <p>correo electrónico: {{$data->email}}</p>
        <p>Area de Adscripción: {{$data->area->nombre}}</p>
        <p>Cargo ó Puesto: {{$data->cargo_puesto}}</p>
        <p>Fecha de la denuncia: {{$data->fecha}}</p>
    <h4>DATOS DEL DENUNCIADO</h4>
        <p>Nombre: {{$data->nombre_servidor_denuncia}}</p>
        <p>Area de Adscripción: {{$data->area_denunciante->nombre}}</p>
        <p>Cargo ó Puesto: {{$data->cargo_puesto_servidor_denuncia}}</p>
        <p>Mensaje de los hechos: {{$data->mensaje_breve_servidor_denuncia}}</p>
        <p>Fecha del evento: {{$data->fecha_servidor_denuncia}}</p>
    <h4>DATOS DEL TESTIGO</h4>
        <p>Nombre: {{ $data->nombre_testigo }}</p>
        <p>Domicilio: {{ $data->domicilio_testigo }}</p>
        <p>Teléfono: {{ $data->telefono_testigo }}</p>
        <p>Correo electrónico: {{ $data->email_testigo }}</p>
        <p>Trabaja en Administración Pública: {{ $data->trabajo_admon_publica }}</p>
        <p>Entidad ó Dependencia: {{ $data->entidad_dependencia_testigo }}</p>
        <p>Cargo ó Puesto: {{ $data->cargo_testigo }}</p>

        <!-- Inicio Si se le quiere dar al envío una apariencia de "tipo formulario" -->
        <!-- <form class="w-50">
            <h4>Datos del denunciante</h4>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" value="{{$data->nombre}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input class="form-control" value="{{$data->telefono}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input class="form-control" value="{{$data->email}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Área de adscripción</label>
                <input class="form-control" value="{{$data->area->nombre}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Cargo ó Puesto</label>
                <input class="form-control" value="{{$data->cargo_puesto}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha</label>
                <input class="form-control" value="{{$data->fecha}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Folio Interno SecTur</label>
                <input class="form-control" value="{{$data->folio}}" readonly>
            </div>
        </form>
        <form class="w-50">
            <h4>Datos del denunciado</h4>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" value="{{$data->nombre_servidor_denuncia}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Área de adscripción</label>
                <input class="form-control" value="{{$data->area_denunciante->nombre}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Cargo ó Puesto</label>
                <input class="form-control" value="{{$data->cargo_puesto_servidor_denuncia}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Mensaje</label>
                <textarea  class="form-control" rows="3" readonly>{{$data->mensaje_breve_servidor_denuncia}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha del evento</label>
                <input class="form-control" value="{{$data->fecha_servidor_denuncia}}" readonly>
            </div>
        </form>
        <form class="w-50">
            <h4>Datos del testigo</h4>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" value="{{ $data->nombre_testigo }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Domicilio</label>
                <input class="form-control" value="{{ $data->domicilio_testigo }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input class="form-control" value="{{ $data->telefono_testigo }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input class="form-control" value="{{ $data->email_testigo }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Trabaja en administración pública</label>
                <input class="form-control" value="{{ $data->trabajo_admon_publica }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Entidad ó Dependencia</label>
                <input class="form-control" value="{{ $data->entidad_dependencia_testigo }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Cargo ó Puesto</label>
                <input class="form-control" value="{{ $data->cargo_testigo }}" readonly>
            </div>
        </form> -->
        <!--  Termina Si se le quiere dar al envío una apariencia de "tipo formulario"-->
</body>
</html>