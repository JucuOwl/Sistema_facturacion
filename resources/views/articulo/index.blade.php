@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')
    <h1>📦 Artículos</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>Listado de Artículos</strong>
        <a href="{{ route('articulos.create') }}" class="btn btn-primary btn-sm">
            ➕ Nuevo
        </a>
    </div>

    <div class="card-body">

        {{-- BUSCADOR --}}
        <form method="GET" action="{{ route('articulos.index') }}" class="row mb-3">
            <div class="col-md-4">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Buscar por código o descripción"
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-secondary">🔍 Buscar</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                       
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th width="160">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($articulos as $articulo)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $articulo->codigo }}</td>
                        <td>{{ $articulo->descripcion }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $articulo->stock > 0 ? 'success' : 'danger' }}">
                                {{ $articulo->stock }}
                            </span>
                        </td>
                        <td>S/. {{ number_format($articulo->precio_venta, 2) }}</td>
                        <td class="text-center">

                            {{-- VER --}}
                            <a class="btn btn-sm btn-info"
                               href="{{ route('articulos.show', $articulo) }}">
                                👁
                            </a>

                            {{-- EDITAR --}}
                            <a class="btn btn-sm btn-warning"
                               href="{{ route('articulos.edit', $articulo) }}">
                                ✏
                            </a>

                            {{-- ELIMINAR --}}
                            <form action="{{ route('articulos.destroy', $articulo) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Eliminar artículo?')">
                                    🗑
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No hay artículos registrados
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="mt-3">
    {!! $articulos->links() !!}
</div>
@endsection
