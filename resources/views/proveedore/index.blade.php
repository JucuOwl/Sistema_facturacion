@extends('adminlte::page')

@section('template_title')
    Proveedores
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span id="card_title">{{ __('Proveedores') }}</span>
                    <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm">{{ __('Create New') }}</a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Documento</th>
                                    <th>Tipo Documento</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Nombre Comercial</th>
                                    <th>Direccion</th>
                                    <th>Ciudad</th>
                                    <th>Telefono</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedore)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $proveedore->no_documento }}</td>
                                        <td>{{ $proveedore->tipoDocumento->descripcion ?? '-' }}</td>
                                        <td>{{ $proveedore->nombre }}</td>
                                        <td>{{ $proveedore->apellido }}</td>
                                        <td>{{ $proveedore->nombre_comercial }}</td>
                                        <td>{{ $proveedore->direccion }}</td>
                                        <td>{{ $proveedore->ciudade->nombre ?? '-' }}</td>
                                        <td>{{ $proveedore->telefono }}</td>
                                        <td>
                                            <form action="{{ route('proveedores.destroy', $proveedore->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('proveedores.show', $proveedore->id) }}">Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('proveedores.edit', $proveedore->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $proveedores->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
