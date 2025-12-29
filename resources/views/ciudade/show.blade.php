@extends('layouts.app')

@section('template_title')
    {{ $ciudade->name ?? __('Show') . " " . __('Ciudade') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ciudade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('ciudades.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigo Ciudad:</strong>
                                    {{ $ciudade->codigo_ciudad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Ciudad:</strong>
                                    {{ $ciudade->nombre_ciudad }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
