@extends('layouts.app')

@section('template_title')
    Forma de Pagos
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Forma de Pagos') }}</span>
                    <a href="{{ route('forma-pagos.create') }}" class="btn btn-primary btn-sm">
                        {{ __('Create New') }}
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-3">
                        {{ $message }}
                    </div>
                @endif

                <div class="card-body bg-white">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Descripción</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formaPagos as $formaPago)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $formaPago->descripcion_formapago }}</td>
                                    <td>
                                        <form action="{{ route('forma-pagos.destroy', $formaPago->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary" href="{{ route('forma-pagos.show', $formaPago->id) }}">Show</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('forma-pagos.edit', $formaPago->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro de eliminar?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {!! $formaPagos->links() !!}
        </div>
    </div>
</div>
@endsection
