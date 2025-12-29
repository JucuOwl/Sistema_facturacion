@extends('adminlte::page')

@section('title', 'Detalle Facturas')

@section('content_header')
    <h1>Detalle Facturas</h1>
@endsection

@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Factura</th>
            <th>Artículo</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detalleFacturas as $detalle)
        <tr>
            <td>{{ ++$i }}</td>
            <td>#{{ $detalle->factura->id }}</td>
            <td>{{ $detalle->articulo->descripcion }}</td>
            <td>{{ $detalle->cantidad }}</td>
            <td>{{ $detalle->total }}</td>
            <td>
                <a class="btn btn-sm btn-warning"
                   href="{{ route('detalle-facturas.edit', $detalle->id) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
