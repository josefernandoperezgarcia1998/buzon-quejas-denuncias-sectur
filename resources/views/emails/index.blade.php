@extends('layouts.general')

@section('title_page', 'Buzón de mensajes')

@section('content_page')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="carrd-header">
        <div class="d-flex justify-content-between">
            <div>
                Mensajes entrantes
            </div>
            {{-- <div class="row g-3 d-flex justify-content-end">
                <div class="col-auto">
                    <form action="" method="post" class="d-flex">
                        <input type="text" id="q" class="form-control" name="q" autocomplete="off" placeholder="Folio, Nombre ó Email">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div> --}}
            <a href="{{route('buzon-excel')}}" class="btn btn-success btn-sm">Descargar excel</a>
        </div>
    </div>
    <div class="card-body">
        {{-- <div class="table-responsive">
            <table class="table">
                <thead class="text-primary">
                    <th>Folio Interno SecTur</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @forelse ($mensajes as $mensaje)
                    <tr>
                        <td>{{ $mensaje->folio }}</td>
                        <td>{{ $mensaje->nombre }}</td>
                        <td>{{ $mensaje->email }}</td>
                        <td>{{ $mensaje->created_at }}</td>
                        @if ($mensaje->estado == 'no_atendido')
                        <td>
                            <span class="badge bg-warning text-dark">{{ $mensaje->estado }}</span>
                        </td>
                        @elseif( ($mensaje->estado == 'atendido'))
                        <td>
                            <span class="badge bg-primary">{{ $mensaje->estado }}</span>
                        </td>
                        @elseif( ($mensaje->estado == 'concluido'))
                        <td>
                            <span class="badge bg-success">{{ $mensaje->estado }}</span>
                        </td>
                        @elseif($mensaje->estado == 'cancelado')
                        <td>
                            <span class="badge bg-danger">{{ $mensaje->estado }}</span>
                        </td>
                        @else
                            
                        @endif
                        <td class="text-primary">
                            <a href="{{ route('emails.show', $mensaje->id) }}" class="btn btn-info btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </a>
                            <form action="{{ route('emails.destroy', $mensaje->id) }}" method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('¿Esta seguro de eliminar este mensaje?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" rel="tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-primary">Buzón vacío</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $mensajes->links() }}
            
        </div> --}}
        <table class="table" id="buzonTable">
            <thead>
                <tr>
                    <th>Folio</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
{{-- Inicio CDM's css para datatables --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
{{-- Fin cDN's css para datatables --}}

{{-- Inicio para datatable responsive  --}}
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
{{-- Fin para datatable responsive  --}}
@endpush

@push('js')
{{-- inicio CDN de jquery para datatables --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
{{-- Fin CDN de Jquery para datatables --}}

{{-- Inicio para responsive de datatables --}}
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
{{-- Fin para responsive de datatables --}}

<script>
$(document).ready(function () {
    $('#buzonTable').DataTable({
        "serverSide": true,
        "ajax": "{{ url('buzon-data') }}",
        "columns": [
            {data: 'folio'},
            {data: 'nombre'},
            {data: 'email'},
            {data: 'estado',
            // Cambiando el color deel estado dependiendo la opción
            render: function (data, type, row) {
                        if (data === "no_atendido") {
                            return '<i class="far fa-dot-circle" style="background-color:#EFF12D; color:black;" /*aria-hidden="true"*/>No atendido</i>';
                        }
                        if (data === 'atendido') {
                            return '<i class="far fa-dot-circle" style="background-color:#9B9BF9; color:black;" /*aria-hidden="true"*/>Atendido</i>';
                        }
                        if (data === 'concluido') {
                            return '<i class="far fa-dot-circle" style="background-color:#B9F99B; color:black;" /*aria-hidden="true"*/>Concluido</i>';
                        }
                        if (data === 'cancelado') {
                            return '<i class="far fa-dot-circle" style="background-color:#F22424; color:white;" /*aria-hidden="true"*/>Cancelado</i>';
                        }
                        return '<i class="far fa-dot-circle" style="color:red" /*aria-hidden="true"*/></i>';
                    }

        },
            {data: 'btn'},
        ],
        responsive: true,
        autoWidth: false,

        "language": {
        "lengthMenu": "Mostrar " +
            `<select class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value='10'>10</option>
                                    <option value='25'>25</option>
                                    <option value='50'>50</option>
                                    <option value='-1'>Todo</option>
                                    </select>` +
            " registros por página",
        "zeroRecords": "Sin registros",
        "info": "Mostrando la página _PAGE_ de _PAGES_",
        "infoEmpty": "",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        'search': 'Buscar:',
        'paginate': {
            'next': 'Siguiente',
            'previous': 'Anterior'
            }
        },
    });
});
</script>
@endpush
