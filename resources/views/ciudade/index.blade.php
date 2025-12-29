@extends('layouts.app')

@section('template_title')
    Ciudades
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span id="card_title">
                        {{ __('Ciudades') }}
                    </span>
                    <a href="{{ route('ciudades.create') }}" class="btn btn-primary btn-sm float-right">
                        {{ __('Crear Nueva') }}
                    </a>
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
                                    <th>Nombre Ciudad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ciudades as $ciudade)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $ciudade->nombre_ciudad }}</td>
                                        <td>
                                            <form action="{{ route('ciudades.destroy', $ciudade->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('ciudades.show', $ciudade->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('ciudades.edit', $ciudade->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Seguro de eliminar?') ? this.closest('form').submit() : false;">
                                                    <i class="fa fa-fw fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $ciudades->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    