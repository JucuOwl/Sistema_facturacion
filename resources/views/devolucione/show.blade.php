@extends('layouts.app')

@section('template_title')
    {{ $devolucione->name ?? __('Show') . " " . __('Devolucione') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Devolucione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('devoluciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Detalle Factura Id:</strong>
                                    {{ $devolucione->detalle_factura_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Motivo:</strong>
                                    {{ $devolucione->motivo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Devolucion:</strong>
                                    {{ $devolucione->fecha_devolucion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad:</strong>
                                    {{ $devolucione->cantidad }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
