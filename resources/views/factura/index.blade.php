@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <h1>🧾 Facturas</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <strong>Listado de Facturas</strong>
        <a href="{{ route('facturas.create') }}" class="btn btn-primary btn-sm">
            ➕ Nueva Factura
        </a>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Num Factura</th>
                    <th>Cliente</th>
                    <th>Empleado</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>IVA</th>
                    <th width="140">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $factura)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $factura->num_factura }}</td>
                    <td>
                        {{ $factura->cliente->nombres ?? '-' }}
                        {{ $factura->cliente->apellidos ?? '' }}
                    </td>
                    <td>{{ $factura->nombre_empleado }}</td>
                    <td>{{ $factura->fecha_facturacion }}</td>
                    <td>S/. {{ $factura->total_factura }}</td>
                    <td>{{ $factura->iva }}</td>
                    <td>
                        <a class="btn btn-sm btn-info"
                           href="{{ route('facturas.show', $factura->id) }}">
                            👁
                        </a>
                        <a class="btn btn-sm btn-warning"
                           href="{{ route('facturas.edit', $factura->id) }}">
                            ✏
                        </a>
                        <form action="{{ route('facturas.destroy', $factura->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                              onclick="return confirm('¿Eliminar factura?')">
                                🗑
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $facturas->links() !!}
    </div>
</div>
@endsection
