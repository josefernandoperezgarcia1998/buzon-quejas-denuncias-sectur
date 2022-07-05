@extends('layouts.general')

@section('title_page', 'Mensaje')

@section('content_page')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-header">
        Formulario de contacto para denuncia y/o queja
    </div>
    <div class="card-body">
        <form action="{{ route('emails.update', $mensaje->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Datos de quién hace la denuncia -->
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="actualizarEstado" class="form-label">Estado</label>
                                    <select class="form-select  w-50" name="estado">
                                        <option value="" selected>Seleccionar...</option>
                                        <option {{ old('estado') == 'no_atendido' ? 'selected' : ($mensaje->estado == 'no_atendido' ? 'selected' : '') }} value="no_atendido">No atendido</option>
                                        <option {{ old('estado') == 'atendido' ? 'selected' : ($mensaje->estado == 'atendido' ? 'selected' : '') }} value="atendido">Atendido</option>
                                        <option {{ old('estado') == 'concluido' ? 'selected' : ($mensaje->estado == 'concluido' ? 'selected' : '') }} value="concluido">Concluido</option>
                                        <option {{ old('estado') == 'cancelado' ? 'selected' : ($mensaje->estado == 'cancelado' ? 'selected' : '') }} value="cancelado">Cancelado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="actualizarEstado" class="form-label">Folio Interno SecTur</label>
                                    <input readonly type="text" class="form-control" name="folio" value="{{ old('folio', $mensaje->folio) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="text-center">
                    <h5>Datos de la persona que presenta la denuncia</h5>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre completo</label>
                                <input readonly type="text" class="form-control" id="nombre"
                                    name="nombre" value="{{ old('nombre', $mensaje->nombre) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input readonly type="tel" class="form-control" id="telefono"
                                    name="telefono" value="{{ old('telefono', $mensaje->telefono) }}" autocomplete="off">
                                    <small><strong>Formato a diez digitos: 961-165-21-48</strong></small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input readonly type="email" class="form-control" id="email"
                                    name="email" value="{{ old('email', $mensaje->email) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="area" class="form-label">Área de adscripción</label>
                                <input readonly type="text" class="form-control" id="area"
                                    name="area" value="{{ old('area', $mensaje->area->nombre) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="cargo_puesto" class="form-label">Cargo ó Puesto</label>
                                <input readonly type="text" class="form-control" id="cargo_puesto"
                                    name="cargo_puesto" value="{{ old('cargo_puesto', $mensaje->cargo_puesto) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input readonly type="datetime" class="form-control" id="fecha" name="fecha" autocomplete="off"
                                value="{{ old('fecha', $mensaje->fecha) }}" readonly>
                                    <small><strong>Día/Mes/Año</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Datos para quién va la denuncia -->
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h5>Datos del servidor(a) público(a) contra quién se presenta la denuncia</h5>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nombre_servidor_denuncia" class="form-label">Nombre</label>
                                <input readonly type="text" class="form-control" id="nombre_servidor_denuncia"
                                    name="nombre_servidor_denuncia" value="{{ old('nombre_servidor_denuncia', $mensaje->nombre_servidor_denuncia) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="area_servidor_denuncia" class="form-label">Área de
                                    Adscripción</label>
                                <input readonly type="text" class="form-control" id="area_servidor_denuncia"
                                    name="area_servidor_denuncia"
                                    autocomplete="off" value="{{ old('area_servidor_denuncia', $mensaje->area_denunciante->nombre) }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="cargo_puesto_servidor_denuncia" class="form-label">Cargo ó
                                    Puesto</label>
                                <input readonly type="text" class="form-control" id="cargo_puesto_servidor_denuncia"
                                    name="cargo_puesto_servidor_denuncia" value="{{ old('cargo_puesto_servidor_denuncia', $mensaje->cargo_puesto_servidor_denuncia) }}"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="mensaje_breve" class="form-label">
                                    Narración muy breve y clara de los hechos, especificando circunstancias de
                                    <strong>modo</strong>, <strong>tiempo</strong>, <strong>lugar</strong> y
                                    <strong>personas involucradas</strong>, señalando medios probatorios de la
                                    conducta, ó en caso de que sesa <strong>anónima</strong>, indicar los medios
                                    probatorios de un tercero.
                                </label>
                                <textarea class="form-control" id="mensaje_breve_servidor_denuncia"
                                    name="mensaje_breve_servidor_denuncia" rows="3" readonly>{{ old('mensaje_breve_servidor_denuncia', $mensaje->mensaje_breve_servidor_denuncia) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 w-25">
                                <label for="fecha_servidor_denuncia" class="form-label">Fecha del evento</label>
                                <input readonly type="date" class="form-control" id="fecha_servidor_denuncia"
                                    name="fecha_servidor_denuncia" value="{{ old('fecha_servidor_denuncia', $mensaje->fecha_servidor_denuncia) }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Datos de la persona que haya sido testigo de los hechos -->
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h5>Datos de la persona que haya sido testigo de los hechos</h5>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nombre_testigo" class="form-label">Nombre</label>
                                <input readonly type="text" class="form-control" id="nombre_testigo"
                                    name="nombre_testigo" value="{{ old('nombre_testigo', $mensaje->nombre_testigo) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="domicilio_testigo" class="form-label">Domicilio</label>
                                <input readonly type="text" class="form-control" id="domicilio_testigo"
                                    name="domicilio_testigo" value="{{ old('domicilio_testigo', $mensaje->domicilio_testigo) }}"  autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="telefono_testigo" class="form-label">Teléfono</label>
                                <input readonly type="text" class="form-control" id="telefono_testigo"
                                    name="telefono_testigo" value="{{ old('telefono_testigo', $mensaje->telefono_testigo) }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email_testigo" class="form-label">Correo electrónico</label>
                                <input readonly type="email" class="form-control" id="email_testigo"
                                    name="email_testigo" value="{{ old('email_testigo', $mensaje->email_testigo) }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="trabajo_testigo" class="form-label">¿Trabaja en la administración
                                    pública estatal?</label>
                                <input readonly type="text" class="form-control w-25" id="trabajo_admon_publica"
                                name="trabajo_admon_publica" value="{{ old('trabajo_admon_publica', $mensaje->trabajo_admon_publica) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div id="si_testigo_div">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="entidad_dependencia_testigo" class="form-label">Entidad ó
                                                Dependencia</label>
                                            <input readonly type="text" class="form-control" id="entidad_dependencia_testigo"
                                                name="entidad_dependencia_testigo" value="{{ old('entidad_dependencia_testigo', $mensaje->entidad_dependencia_testigo) }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="cargo_testigo" class="form-label">Cargo</label>
                                            <input readonly type="text" class="form-control" id="cargo_testigo"
                                                name="cargo_testigo" value="{{ old('cargo_testigo', $mensaje->cargo_testigo) }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
            <a href="{{ route('emails.index') }}" class="btn btn-sm btn-secondary">Volver</a>
        </form>
    </div>
</div>
@endsection

@push('css')
    
@endpush

@push('js')
    
@endpush