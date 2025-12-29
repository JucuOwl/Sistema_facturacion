@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Cliente
        </a>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Documento</th>
                    <th>Cliente</th>
                    <th>Ciudad</th>
                    <th>Teléfono</th>
                    <th width="150">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cliente->documento }}</td>
                    <td>{{ $cliente->nombres }} {{ $cliente->apellidos }}</td>
                    <td>{{ $cliente->ciudad->nombre_ciudad ?? '-' }}</td>

                    <td>{{ $cliente->telefono }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('clientes.edit',$cliente->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $clientes->links() }}
    </div>
</div>
@endsection
